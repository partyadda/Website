<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Repositories\AdminBookingSlotsRepo;

use App\Http\Requests\AdminBookTheaterRequest;

use App\Models\booking;
use App\Models\customer;
use App\Models\booking_addon;
use App\Models\payment;
use App\Models\theater;
use App\Models\Discount;

use Exception;

class AdminBookingSlotsController extends Controller
{
  protected $bookingRepo;

  public function __construct(AdminBookingSlotsRepo $bookingRepo)
  {
    $this->bookingRepo = $bookingRepo;
  }

  public function select_theater_or_package() 
  {
    if(!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    $branchId = 1;
    $sessionBranchid = session('branch_id');
    if($sessionBranchid != NULL && $sessionBranchid != '' &&  $sessionBranchid > 0 ) {
      $branchId = $sessionBranchid;
    }

    $theaters = $this->bookingRepo->getAllTheatres($branchId);
    
    $data['theaters'] = $theaters;   

    return view('booking.admin_book_slots_home', $data);
  }

  public function book_theater($theatre_id) 
  {   
    if(!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($theatre_id == NULL || $theatre_id == 0) {
      return redirect()->back();
    }

    $theater = $this->bookingRepo->getTheatreById($theatre_id); 
    
    if ($theater == NULL || !isset($theater->id)) {
      return redirect()->back();
    }

    $data['theater'] = $theater;
    $data['coupon_codes'] = $coupon_codes = $this->bookingRepo->getAllCouponCodes($theater->branch_id);

    return view('booking.admin_book_theatre', $data);
  }

  public function book_package($package_id)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($package_id == NULL || $package_id == 0) {
      return redirect()->back();
    }
    $package = $this->bookingRepo->getPackgeById($package_id);

    if ($package == NULL || !isset($package->id)) {
      return redirect()->back();
    }

    $data['package'] = $package;
    $data['coupon_codes'] = $this->bookingRepo->getAllCouponCodes($package->branch_id);

    return view('booking.admin_book_package', $data);
  }

  public function book_slot_store(AdminBookTheaterRequest $request)
  {
    $isValidateOnly = $request->isValidateOnly;
   
    if($isValidateOnly == 1) {
      return response()->json(['success' => true]);
    } else {
      try {
        return DB::transaction(function () use ($request) {
          $transaction_id = NULL;
          $bookingData = $request;
          
          $bookingSlotDate = date('Y-m-d', strtotime($bookingData->admin_booking_date));
          $checkForExisting = booking::where(['theatre_id' => $bookingData->theater_id, 'booking_status' => '1', 'slot_id' => $bookingData->theater_slot_id, 'date' => $bookingSlotDate])->get();


          if (isset($checkForExisting) && count($checkForExisting) > 0) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Slot is already booked, Please select other available slot and book']);
          }

          $customer = customer::where('phone', $bookingData->customer_phone)->first();
          $paymentScreenshotPath = NULL;
        //  if ($bookingData->hasFile('payment_screen_shot')) {
         //   $file = $bookingData->file('payment_screen_shot');
         //   $fileName = 'payment_'.strtotime("now").'.'. $file->getClientOriginalExtension();
         //   $filePath = $file->storeAs($this->getUploadPath(), $fileName);
         //   $paymentScreenshotPath = asset('storage/' . $filePath);
        //  }

          if ($customer == NULL) {
            $customerData['customer_name'] = $bookingData->customer_name;
          //  $customerData['email'] = $bookingData->customer_email;
            $customerData['phone'] = $bookingData->customer_phone;
            
            $customer = customer::create($customerData);
          } else {      
            $customerData['customer_name'] = $bookingData->customer_name;
            //$customerData['email'] = $bookingData->customer_email;
            
            customer::find($customer->id)->update($customerData);
          }

          $theater =  $this->bookingRepo->getTheatreById($bookingData->theater_id);
          $package = NULL;
          $packageAddons = NULL;
          $branchAddons = NULL;

          $isPackageBooking = $bookingData->is_package_booking == 1;
          $baseAmount = 0;
          if ($isPackageBooking) {
            $package = $this->bookingRepo->geOnlyPackgeById($bookingData->package_id);
            $baseAmount = $package->package_amount;
          } else {
            $baseAmount = $theater->price;
          }
          $packageCakeExtraAmount = 0;
          $extraPersonAmount = 0;
          $decorationAmount = 0;
          $cakeAmount = 0;
          $addOnAmount = 0;

          $cakeId = NUll;

          if($bookingData->no_of_guest > $bookingData->peopleallowed) {
            $extraPersonAmount = $bookingData->extra_person_price * ($bookingData->no_of_guest - $bookingData->peopleallowed);
          }

          if($bookingData->decoration_needed == 1) {
            if($bookingData->decoration_included != 1) {
              $decorationAmount = $bookingData->decoration_amount;
            }
            if ($isPackageBooking) {
              $packageCake = $this->bookingRepo->getPackageCake($bookingData->package_cake_id);
              $cakeId = $packageCake->cake_id;
              $packageCakeExtraAmount = $packageCake->extra_amount;
              $cakeAmount = $packageCake->extra_amount;
            } else {
              $branchCake = $this->bookingRepo->getBranchCake($bookingData->branch_cake_id);
              $cakeId = $branchCake->cake_id;
              $cakeAmount = $branchCake->price;
            }

            if ($isPackageBooking && isset($bookingData->package_addon_ids) && count($bookingData->package_addon_ids) > 0) {
              $packageAddons = $this->bookingRepo->getPackageAddons($bookingData->package_addon_ids);
              foreach ($packageAddons as $addOn) {
                $addOnAmount = $addOnAmount + $addOn->extra_amount;
              }
            } else if (isset($bookingData->branch_addon_ids) && count($bookingData->branch_addon_ids) > 0) {
              $branchAddons = $this->bookingRepo->getBranchAddons($bookingData->branch_addon_ids);
              foreach($branchAddons as $addOn) {
                $addOnAmount = $addOnAmount + $addOn->price;
              }
            }
          }

          $advancePaidAmount =  $bookingData->payment_advance;

          $subTotalAmount = $baseAmount + $extraPersonAmount + $cakeAmount + $addOnAmount + $decorationAmount;

          $discountAmount = 0;
          $discount_id = NULL;
          $promo_code = NULL;
          if (isset($bookingData->coupon_code_id)) {
            $couponCode = Discount::where(['discount_id' => $bookingData->coupon_code_id])->first();
            if (isset($couponCode)) {
              $discount_id = $couponCode->discount_id;
              $promo_code = $couponCode->promocode;
              if ($couponCode->discount_type == "FLAT") {
                $discountAmount = $couponCode->discount;
              } else if ($couponCode->discount_type == "PERCENTAGE") {
                $discountAmount = $baseAmount * ($couponCode->discount / 100);
              }
            }
          }

          $balanceAmount = $subTotalAmount - $advancePaidAmount - $discountAmount;

          $Booking = new booking();

          if ($isPackageBooking) {
            $Booking->package_id = $bookingData->package_id;
          } else {
            $Booking->package_id = NULL;
          }
          $Booking->customer_id = $customer->id;
          $Booking->final_price = $balanceAmount;
          $Booking->discountid = $discount_id;
          $Booking->promocode = $promo_code;

          $Booking->date = $bookingSlotDate;
          $Booking->No_people = $bookingData->no_of_guest;
          $Booking->theatre_id = $theater->id;
          $Booking->cake_id = $cakeId;
          $Booking->name_on_cake = $bookingData->name_on_cake;
          
          $Booking->new_starttime = $bookingData->new_starttime; 
          $Booking->new_endttime = $bookingData->new_endtime;
          
          $Booking->cake_extra_amount = $packageCakeExtraAmount;
          $Booking->slot_id = $bookingData->theater_slot_id;
          $Booking->decoration_id = $bookingData->decoration_id;
          $Booking->partner_name = $bookingData->person_one;
          $Booking->your_name = $bookingData->person_two;

          $Booking->booking_status = 1;
          $Booking->payment_status = "Payment success";
          $Booking->sms_sent = 0;
          $Booking->cal_event_id = NUll;

          $Booking->payment_type = $bookingData->payment_type;
          $Booking->payment_confirmed_by = $bookingData->payment_confirmed_by_id;
          //$Booking->payment_screenshot = $paymentScreenshotPath;
          $Booking->payment_screenshot = $bookingData->payment_screenshot;
          $Booking->remarks_or_notes = $bookingData->remarks_or_notes;
          

          $booking_id = NULL;

          if ($Booking->save()) {
            $booking_id = $Booking->id;
        
            if(isset($branchAddons)) {
              foreach ($branchAddons as $addon) {
                $booking_addon = new booking_addon();
                $booking_addon->booking_id = $booking_id;
                $booking_addon->addon_id = $addon->addon_id;
                $booking_addon->amount = $addon->price;
                $booking_addon->package_id = NULL;

                $booking_addon->save();
              }
            } else if (isset($packageAddons)) {
              foreach ($packageAddons as $addon) {
                $booking_addon = new booking_addon();
                $booking_addon->booking_id = $booking_id;
                $booking_addon->addon_id = $addon->addon_id;
                $booking_addon->amount = $addon->extra_amount;
                $booking_addon->package_id = $bookingData->package_id;

                $booking_addon->save();
              }
            }
  
            // Save payment information
            $paymentData = [
              'bookingid' => $booking_id,
              'amount' => $advancePaidAmount,
              'transactionid' => $transaction_id,
              'status' => '1',
              'paymentgateway' => 'offline',
              'response_msg' => 'Payment success',
            ];
  
            Payment::create($paymentData)->id;
          }
          
          return redirect()->route('admin.booking')->with('success', 'Slot Booked Successfully');;
        });
      } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
      }
    }
  }

  public function slots_by_date_and_theater(Request $request)
  {
    $theatre_id = $request->theatre_id;
    $selected_date = date('Y-m-d', strtotime($request->selected_date));

    $slots = [];
    if ($request->selected_date != NULL && $request->selected_date != '') {
      $slots =  $this->bookingRepo->getTheatreSlots($theatre_id);

      foreach ($slots as $slot) {
        $slot['isSlotBookedOrLapsed'] = $this->bookingRepo->isSlotAvailable($theatre_id, $slot->slot_id, $slot->slot->start_time, $selected_date);
        $slot->slot['start_time_24'] = date('H:i', strtotime($slot->slot->start_time));
        $slot->slot['end_time_24'] = date('H:i', strtotime($slot->slot->end_time));
      }
    }

    return response()->json([
      'success' => true,
      'slots' => $slots
    ]);
  }

  private function isSessionExist() {
    $sortedBranchIds = session('branch_ids', []);
    if($sortedBranchIds == null){
        return false;
    }
    return true;
  }

  public function edit_remarks($booking_id)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($booking_id == NULL || $booking_id == 0) {
      return redirect()->back();
    }

    $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment'])->where('id', '=', $booking_id)->first();

    // Remove duplicate addons from each booking
    $booking->each(function ($book) {
      $book->addons = $book->addons->unique(function ($addon) {
        return $addon->addon->name;
      });
    });

    if ($booking == NULL || !isset($booking->id)) {
      return redirect()->back();
    }

    $data['booking'] = $booking;

    //$this->printAndExit($booking);

    return view('booking.admin_booking_update_remarks', $data);
  }

  public function update_remarks(Request $request)
  {
    $request->validate([
      'booking_id' => 'required|integer'
    ]);

    $data['remarks_or_notes'] = $request->remarks_or_notes;
    $data['payment_screenshot'] = $request->payment_screenshot;
    $data['total_amount'] = $request->total_amount;
    
    Booking::find($request->booking_id)->update($data);
    return redirect()->route('admin.booking')->with('success', 'Remarks Updated Successfully');
  }

  public static function getUploadPath()
  {
    return 'uploads/payment';
  }

  private function printAndExit($data)
  {
    echo json_encode($data);
    exit;
  }
}