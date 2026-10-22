<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\booking;
use App\Models\payment;
use App\Models\customer;
use App\Models\booking_addon;
use App\Models\Discount;
use App\Models\theatre;
use Razorpay\Api\Api;
use App\Repositories\PackageRepo;
use Illuminate\Support\Facades\DB;
use App\Helper\Helper;

use Exception;

class PackageController extends Controller
{
  protected $rzrApi, $pckg;

  public function __construct(PackageRepo $pckg)
  {
    $this->rzrApi = new Api(env('RAZOR_API_KEY'), env('RAZOR_API_SECRET'));
    $this->pckg = $pckg;
    $this->pckg->resetPackageBookingSession();
  }

  public function package_booking($package_name, $package_id)
  {
    $package = $this->pckg->getPackgeById($package_id);

    if ($package == NULL || !isset($package->id)) {
      return redirect()->back();
    }

    // $packageTheatre = $this->pckg->getPackageTheatre($package_id, $theatre_id);
    // if ($packageTheatre == NULL || count($packageTheatre) == 0) {
    //   return redirect()->back();
    // }
    // $package->package_theater_selected = $packageTheatre;

    //$this->printAndExit($package);

    $data['package'] = $package;

    return view('package_booking', $data);
  }

  public function package_slotsby_date_and_theater(Request $request)
  {
    $theatre_id = $request->theatre_id;
    $selected_date = date('Y-m-d', strtotime($request->selected_date));

    $slots = [];
    if ($request->selected_date != NULL && $request->selected_date != '') {
      $slots =  $this->pckg->getTheatreSlots($theatre_id);

      foreach ($slots as $slot) {
        $slot['isSlotBookedOrLapsed'] = $this->pckg->isSlotAvailable($theatre_id, $slot->slot_id, $slot->slot->start_time, $selected_date);
        $slot->slot['start_time_24'] = date('H:i', strtotime($slot->slot->start_time));
        $slot->slot['end_time_24'] = date('H:i', strtotime($slot->slot->end_time));
      }
    }

    return response()->json([
      'success' => true,
      'slots' => $slots
    ]);
  }

  function update_customer_details(Request $request)
  {
    $rules = [
      'customer_name' => 'required|string|max:45',
      'customer_phno' => 'required|digits:10'
      //,'customer_email' => 'required|email'
    ];

    $attributes = [
      'customer_name' => 'Booking Person Name',
      'customer_phno' => 'Whatsapp Number'
      //,'customer_email' => 'Email1 ID',
    ];

    $this->validate($request, $rules, [], $attributes);

    //$customer = customer::where('phone', $request->number)->where('email', $request->email)->first();
    $customer = customer::where('phone', $request->customer_phno)->first();

    if ($customer === null) {
      $customer_save = new customer();
      $customer_save->customer_name = $request->customer_name;
      $customer_save->email = $request->customer_email;
      $customer_save->phone = $request->customer_phno;
      $customer_save->referred_by = NULL; //$request->ref_by;
      $customer_save->wherefrom = 'BackEnd';
      $customer_save->save();

      //$customerData = customer::select('id')->where('phone', $request->customer_phno)->where('email', $request->customer_email)->first();
      $customerData = customer::select('id')->where('phone', $request->customer_phno)->first();
    } else {
      //$customerData = customer::select('id')->where('phone', $request->customer_phno)->where('email', $request->customer_email)->first();
      $customerData = customer::select('id')->where('phone', $request->customer_phno)->first();

      customer::where('id', $customerData->id)->update([
        'customer_name' => $request->customer_name,
        'email' => $request->customer_email,
        'phone' => $request->customer_phno,
      ]);
    }

    return response()->json([
      'success' => true,
      'customer' => $customerData
    ]);
  }

  function hold_book_package(Request $request)
  {
    $bookingData = $request->all();
    $addon_data = json_decode($bookingData['addon_data']);
    $bookingData['addon_data'] = $addon_data;

    $this->pckg->setPackageBookingSession($bookingData);

    return response()->json(['success' => true]);
  }

  function book_package_now(Request $request)
  {
    try {
      return DB::transaction(function () use ($request) {
        $transaction_id = NULL;
        $bookingData = $this->pckg->getPackageBookingSession();

        $checkForExisting = booking::where(['theatre_id' => $bookingData->theatre_id,  'booking_status' => '1', 'slot_id' => $bookingData->slot_id, 'date' => date('Y-m-d', strtotime($bookingData->slot_date))])->whereNotIn('customer_id', [$bookingData->customer_id])->get();

        // $checkForExisting = booking::where(
        //   [
        //     'theatre_id' => $bookingData->theatre_id,
        //     'slot_id' => $bookingData->slot_id,
        //     'date' => date('Y-m-d', strtotime($bookingData->slot_date))
        //   ]
        // )->whereIn('booking_status', Helper::BOOKING_STATUS_CHECK_ARRAY)->whereNotIn('customer_id', [$bookingData->customer_id])->get();


        if (isset($checkForExisting) && count($checkForExisting) > 0) {
          return response()->json(['success' => false, 'errMsg' => 'Slot is already booked, Please select other available slot and book']);
        }

        $Booking = new booking();

        $discount_id = $bookingData->coupon_code_id;
        $promo_code = NULL;
        if (isset($discount_id)) {
          $getCouponCode = Discount::where(['discount_id' => $discount_id])->first();
          if (isset($getCouponCode)) {
            $promo_code = $getCouponCode->promocode;
          }
        }

        $Booking->package_id = $bookingData->package_id;;

        $Booking->customer_id = $bookingData->customer_id;
        $Booking->final_price = $bookingData->balance_amount;
        $Booking->discountid = $discount_id;
        $Booking->promocode = $promo_code;

        $Booking->date = date('Y-m-d', strtotime($bookingData->slot_date));
        $Booking->No_people = $bookingData->no_of_guest;
        $Booking->theatre_id = $bookingData->theatre_id;
        $Booking->cake_id = $bookingData->cake_id;
        $Booking->name_on_cake = $bookingData->name_on_cake;
        $Booking->cake_amount = $bookingData->cake_extra_amount;
        $Booking->slot_id = $bookingData->slot_id;
        $Booking->decoration_id = $bookingData->decoration_id;
        $Booking->your_name = $bookingData->decoration_your_name;
        $Booking->partner_name = $bookingData->decoration_partner_name;

        $Booking->booking_status = 0;
        $Booking->payment_status = "Created";
        $Booking->sms_sent = 0;
        $Booking->cal_event_id = NUll;

        $booking_id = NULL;
        $payment_id = NULL;

        if ($Booking->save()) {
          $booking_id = $Booking->id;
          $addonData = $bookingData->addon_data;

          foreach ($addonData as $index => $addon) {
            $booking_addon = new booking_addon();
            $booking_addon->booking_id = $booking_id;
            $booking_addon->addon_id = $addon->addon_id;
            $booking_addon->amount = $addon->add_on_extra_amount;
            $booking_addon->package_id = $bookingData->package_id;;

            $booking_addon->save();
          }

          // Save payment information
          $paymentData = [
            'bookingid' => $booking_id,
            'amount' => 0,
            'transactionid' => $transaction_id,
            'status' => '0',
            'paymentgateway' => 'razorpay',
            'response_msg' => 'Payment Pending',
          ];

          $payment_id = Payment::create($paymentData)->payment_id;
        }

        if ($booking_id != NULL && $payment_id != NULL) {
          $paybleAmount = $bookingData->advance_amount;
          $paybleAmountInPaise = $paybleAmount * 100;

          $this->pckg->updateBilling($booking_id);

          $customer = customer::find($bookingData->customer_id);

          $rarPayNotes = array('padda_booking_id' => $booking_id, 'padda_payment_id' => $payment_id, 'customer_id' => $customer->id);
          $receipt = "PADA-" . $booking_id . "-" . $payment_id;
          $createOrderArray = array('receipt' => $receipt, 'amount' => $paybleAmountInPaise, 'currency' => 'INR', 'notes' => $rarPayNotes);
          $rzrPayOrder = $this->rzrApi->order->create($createOrderArray);

          return response()->json(['success' => true, 'booking_id' => $booking_id, 'payment_id' => $payment_id, 'customer' => $customer, 'paybleAmount' => $paybleAmount, 'paybleAmountInPaise' => $paybleAmountInPaise, 'rzr_order_id' => $rzrPayOrder->id]);
        } else {
          return response()->json(['success' => false, 'errMsg' => 'Something went wrong']);
        }
      });
    } catch (Exception $e) {
      return response()->json(['success' => false, 'errMsg' => $e->getMessage()]);
    }
  }

  /*
  public function handle_seo_url($package_name, $package_id)
  {
    $package = $this->pckg->getPackgeById($package_id);

    if ($package == NULL || !isset($package->id)) {
      return redirect()->route('index');
    } else {
      return redirect()->route('package.booking', $package_id);
    }
  } */

  private function printAndExit($data)
  {
    echo json_encode($data);
    exit;
  }
}