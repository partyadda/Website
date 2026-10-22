<?php
namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Repositories\AdminBookingSlotsRepo;
use App\Http\Requests\AdminBookTheaterRequest;
use App\Models\booking;
use App\Models\customer;
use App\Models\booking_addon;
use App\Models\BookingBilling;
use App\Models\payment;
use App\Models\theater;
use App\Models\Discount;
use Exception;
use Carbon\Carbon;
use App\Models\branch_cake;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    /*
    $booking = Booking::whereNotNull('payment_screenshot')->get();
    if (isset($booking)) {
      foreach ($booking as $bk) {
        if (!str_starts_with($bk->payment_screenshot, "http")) {
          $data['payment_screenshot'] = NULL;
          $data['pre_booking_remarks'] = $bk->payment_screenshot;
          Booking::find($bk->id)->update($data);
        }
      }
    }
    */

    /*
    $booking = Booking::with(['billing'])->where('cake_extra_amount', '>', 0)->get();
    if (isset($booking)) {
      foreach ($booking as $bk) {
        $cake_amount = Helper::getZeroIfNotSet($bk->cake_extra_amount);
        if ($cake_amount > 0) {
          $cake_extra_amount = 0;
          if ($bk->cake_id == 99) {
            $cake_extra_amount = $cake_amount;
            $cake_amount = 0;
          }
          $data['cake_extra_amount'] = $cake_extra_amount;
          $data['cake_amount'] = $cake_amount;
          Booking::find($bk->id)->update($data);
        }
      }
    }
    */

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
    $data['booking'] = new booking();
    $data['theater'] = $theater;

    $data['base_amount'] = $theater->price;
    $data['persons_allowed'] = $theater->peopleallowed;
    $data['decoration_amount'] = $theater->branch->decoration_amount;

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
    $data['booking'] = new booking();
    $data['package'] = $package;

    $data['base_amount'] = $package->package_amount;
    $data['persons_allowed'] = $package->theatre->peopleallowed;
    $data['decoration_amount'] = 0; // For package decoration amount is always 0

    $data['coupon_codes'] = $this->bookingRepo->getAllCouponCodes($package->branch_id);
    return view('booking.admin_book_package', $data);
  }

  public function edit_booking(int $booking_id, int $nav_type)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }

    $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment', 'billing'])->where('id', '=', $booking_id)->first();

    if (!isset($booking)) {
      return redirect()->back();
    }
    $booking->theatre->makeHidden(['description', 'short_description', 'long_description']);
    $booking['date_formatted'] = Carbon::parse($booking->date)->format('d-m-Y');
    $booking['addon_ids'] = $addon_ids = $booking->addons->pluck('addon_id')->toArray();

    if ($booking->package_id != NULL && $booking->package_id > 0) {
      $package = $this->bookingRepo->getPackgeById($booking->package_id);
      if ($package == NULL || !isset($package->id)) {
        return redirect()->back();
      }

      $package->package_addons->map(function ($item) use ($addon_ids) {
        if (in_array($item['addon_id'], $addon_ids)) {
          $item['isSelected'] = 1;
        }
        return $item;
      });

      $data['booking'] = $booking;
      $data['package'] = $package;

      $data['base_amount'] = Helper::getAmountForBilling($package->package_amount, $booking->billing?->base_amount);
      $data['persons_allowed'] = Helper::getAmountForBilling($package->theatre->peopleallowed, $booking->persons_allowed);
      $data['decoration_amount'] = 0; // For package decoration amount is always 0

      $data['nav_type'] = $nav_type;
      $data['coupon_codes'] = $this->bookingRepo->getAllCouponCodes($package->branch_id);

      //$this->printAndExit($booking);

      return view('booking.admin_book_package', $data);
    } else {
      $theatre_id = $booking->theatre_id;
      if ($theatre_id == NULL || $theatre_id == 0) {
        return redirect()->back();
      }
      $theater = $this->bookingRepo->getTheatreById($theatre_id);

      if ($theater == NULL || !isset($theater->id)) {
        return redirect()->back();
      }

      $theater->branch->branch_addons->map(function ($item) use ($addon_ids) {
        if (in_array($item['addon_id'], $addon_ids)) {
          $item['isSelected'] = 1;
        }
        return $item;
      });

      $data['booking'] = $booking;
      $data['theater'] = $theater;

      $data['base_amount'] = Helper::getAmountForBilling($theater->price, $booking->billing?->base_amount);
      $data['persons_allowed'] = Helper::getAmountForBilling($theater->peopleallowed, $booking->persons_allowed);
      $data['decoration_amount'] = Helper::getAmountForBilling($theater->branch->decoration_amount, $booking->billing?->decoration_amount);

      $data['nav_type'] = $nav_type;
      $data['coupon_codes'] = $this->bookingRepo->getAllCouponCodes($theater->branch_id);

      //$this->printAndExit($booking);

      return view('booking.admin_book_theatre', $data);
    }
  }

  public function book_slot_store(AdminBookTheaterRequest $request)
  {
    $isValidateOnly = $request->isValidateOnly;
   
    if($isValidateOnly == 1) {
      return response()->json(['success' => true]);
    } else {
      try {
        return DB::transaction(function () use ($request) {
          $isSlotChanged = 0;
          $transaction_id = NULL;
          $bookingData = $request;

          $isEdit = $request->is_edit == 1;

          $isCheckForExisting = 1;

          $bookingExisting = NULL;
          if ($isEdit) {
            $booking_id = $bookingData->booking_id ?? 0; // For Edit value exist else 0
            $bookingExisting = $this->bookingRepo->getBooking($booking_id); // Old one

            if (!isset($bookingExisting)) {
              return redirect()->back()->withInput()->withErrors(['msg' => 'Booking not found to update']);
            }

            $transaction_id = $bookingExisting->payment?->transaction_id ?? NULL;

            if ($bookingExisting->theatre_id == $bookingData->theater_id &&  $bookingExisting->slot_id == $bookingData->theater_slot_id) {
              $isCheckForExisting = 0;
              $isSlotChanged = 0;
            } else {
              $isSlotChanged = 1;
            }
          }

          $bookingSlotDate = date('Y-m-d', strtotime($bookingData->admin_booking_date));

          if ($isCheckForExisting) {
            $checkForExisting = booking::where([
              ['theatre_id', '=', $bookingData->theater_id,],
              ['slot_id', '=', $bookingData->theater_slot_id],
              ['date', '=', $bookingSlotDate]
            ])->whereIn('booking_status', Helper::BOOKING_STATUS_CHECK_ARRAY)->get();
          }

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
            //$customerData['email'] = $bookingData->customer_email;
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
          $shortDurationDiscountAmount = 0;
          $extraPersonAmount = 0;
          $decorationAmount = 0;
          $cakeAmount = 0;
          $extra_person_price = 0;
          $addOnAmount = 0;
          $cakeId = NUll;
          
          if ($isPackageBooking) 
          {
            $package = $this->bookingRepo->geOnlyPackgeById($bookingData->package_id);
            //$baseAmount = $package->package_amount;
            $baseAmount = Helper::getAmountForBilling($package->package_amount,  $bookingData->base_amount);
            $extra_person_price =  $package->extra_person_charge;
          } 
          else 
          {
            //$baseAmount = $theater->price;
            $baseAmount = Helper::getAmountForBilling($theater->price, $bookingData->base_amount);
            $extra_person_price =  $theater->extra_person_price;
          }

          if (isset($theater->Percentage) && $theater->Percentage <= 99) {
            $shortDurationDiscountAmount = (ceil($baseAmount * ($theater->Percentage / 100))) - $baseAmount;
          }
          $cakeExtraAmount = Helper::getZeroIfNotSet($bookingData->cake_extra_amount); // For Customized
          $persons_allowed = $bookingData->peopleallowed;

          if ($bookingData->no_of_guest > $persons_allowed) {
            $extraPersonAmount = $extra_person_price * ($bookingData->no_of_guest - $persons_allowed);
          }

          if ($bookingData->decoration_needed == 1) {
            if($bookingData->decoration_included != 1) {
              $decorationAmount = $bookingData->decoration_amount;
            }
            if ($isPackageBooking) {
              $packageCake = $this->bookingRepo->getPackageCake($bookingData->package_cake_id);
              $cakeId = $packageCake->cake_id;
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
          $subTotalAmount = $baseAmount + $extraPersonAmount + $cakeAmount + $cakeExtraAmount + $addOnAmount + $decorationAmount;

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
          $balanceAmount = $subTotalAmount - $advancePaidAmount - $discountAmount - $shortDurationDiscountAmount;
         
          $Booking = new booking();
          if ($isPackageBooking) {
            $Booking->package_id = $bookingData->package_id;
          } else {
            $Booking->package_id = NULL;
          }
          $Booking->customer_id = $customer->id;
          
          //why is it the balance amount 
          $Booking->final_price = $balanceAmount;
          
          //total aoiunt
          $Booking->total_amount = $subTotalAmount;
          
          //base amount - what if it is editable 
          
          $Booking->discountid = $discount_id;
          $Booking->promocode = $promo_code;
          $Booking->date = $bookingSlotDate;
          $Booking->No_people = $bookingData->no_of_guest;
          $Booking->theatre_id = $theater->id;
          $Booking->cake_id = $cakeId;
          $Booking->name_on_cake = $bookingData->name_on_cake;
          
          $Booking->new_starttime = $bookingData->new_starttime; 
          $Booking->new_endttime = $bookingData->new_endtime;

          $Booking->cake_amount = $cakeAmount;
          $Booking->cake_extra_amount = $cakeExtraAmount;
          $Booking->slot_id = $bookingData->theater_slot_id;
          $Booking->decoration_id = $bookingData->decoration_id;
          $Booking->partner_name = $bookingData->person_one;
          $Booking->your_name = $bookingData->person_two;
          if ($isEdit && $isSlotChanged) {
            $Booking->booking_status = Helper::BOOKING_STATUS_RE_SCHEDULED;
          } else {
            $Booking->booking_status = Helper::BOOKING_STATUS_SUCCESS;
          }
          $Booking->payment_status = "Payment success";
          if ($isEdit) {
            $Booking->sms_sent = 0;
            $Booking->cal_event_id = NULL;
          }
          $Booking->payment_type = $bookingData->payment_type;
          $Booking->payment_confirmed_by = $bookingData->payment_confirmed_by;
          //$Booking->payment_screenshot = $paymentScreenshotPath;
          //$Booking->payment_screenshot = $bookingData->payment_screenshot;
          $Booking->pre_booking_remarks = $bookingData->pre_booking_remarks;
          $Booking->remarks_or_notes = $bookingData->remarks_or_notes;

          $Booking->discount_amount = $discountAmount;
          $Booking->persons_allowed = $persons_allowed;
          $Booking->short_duration_discount_amount = $shortDurationDiscountAmount;

          $savedBookingId = 0;
          if ($isEdit) {
            $this->bookingRepo->updateBooking($bookingData->booking_id, $Booking->toArray());
            // Booking::find($bookingData->booking_id)->update($Booking->toArray());
            $savedBookingId = $bookingData->booking_id;
          } else {
            $Booking->save();
            $savedBookingId = $Booking->id;
          }
          $booking_id = $savedBookingId;

          if ($savedBookingId > 0) {
            if(isset($branchAddons)) {
              foreach ($branchAddons as $addon) {
                $booking_addon = new booking_addon();
                $booking_addon->booking_id = $booking_id;
                $booking_addon->addon_id = $addon->addon_id;
                $booking_addon->amount = $addon->price;
                $booking_addon->package_id = NULL;

                if ($isEdit) {
                  booking_addon::updateOrCreate(
                    ['booking_id' => $booking_id, 'addon_id' => $addon->addon_id], // Search criteria
                    ['amount' =>  $addon->price, 'package_id' => $bookingData->package_id] // Values to update/create
                  );
                } else {
                  $booking_addon->save();
                }
              }
            } else if (isset($packageAddons)) {
              foreach ($packageAddons as $addon) {
                $booking_addon = new booking_addon();
                $booking_addon->booking_id = $booking_id;
                $booking_addon->addon_id = $addon->addon_id;
                $booking_addon->amount = $addon->extra_amount;
                $booking_addon->package_id = $bookingData->package_id;
                if ($isEdit) {
                  booking_addon::updateOrCreate(
                    ['booking_id' => $booking_id, 'addon_id' => $addon->addon_id], // Search criteria
                    ['amount' =>  $addon->extra_amount, 'package_id' => $bookingData->package_id] // Values to update/create
                  );
                } else {
                  $booking_addon->save();
                }
              }
            }

            // Save Billing Details
            BookingBilling::updateOrCreate(
              ['booking_id' => $booking_id], // Search criteria
              ['base_amount' =>  $baseAmount, 
              'extra_person_price' => $bookingData->extra_person_price, 
              'cleaning_charge_amount' => $bookingData->cleaning_charge_amount, 
              'extra_time_amount' => $bookingData->extra_time_amount, 
              'photo_print_amount' => $bookingData->photo_print_amount,
              'special_discount_amount' => $bookingData->special_discount_amount, 
              
              'gift_item' => $bookingData->gift_item,
              'drive_link' => $bookingData->drive_link,
              'verified_by' => $bookingData->verified_by, 
             
              
              'extra_person_amount' => $extraPersonAmount, 
              'decoration_amount' => $decorationAmount, 
              'addon_total_amount' => $addOnAmount] // Values to update/create
            );

            // Save payment information
            if ($isEdit) {
              $paymentData = [
                'bookingid' => $booking_id,
                'amount' => $advancePaidAmount,
                'status' => '1',
                'response_msg' => 'Payment success',
              ];
              Payment::find($bookingExisting->payment->payment_id)->update($paymentData);
            } else {
              $paymentData = [
                'bookingid' => $booking_id,
                'amount' => $advancePaidAmount,
                'transactionid' => $transaction_id,
                'status' => '1',
                'paymentgateway' => 'offline',
                'response_msg' => 'Payment success',
              ];
              Payment::create($paymentData);
            }
          }

          $message = $isEdit ? "Booking Updated Successfully" : "Slot Booked Successfully";

          return redirect()->route('admin.booking')->with('success', $message . ' 
          (' . $booking_id . ' for ' . $bookingData->customer_name . ' on ' . $bookingSlotDate . ')');
        });
      } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
      }
    }
  }
  
  public function slots_by_date_and_theater(Request $request)
  {
    $booking_id = $request->booking_id ?? 0; // For Edit value exist else 0
    $booking = Booking::find($booking_id);

    $theatre_id = $request->theatre_id;

    $selected_date = date('Y-m-d', strtotime($request->selected_date));
    $slots = [];
    if ($request->selected_date != NULL && $request->selected_date != '') {
      $slots =  $this->bookingRepo->getTheatreSlots($theatre_id);
      foreach ($slots as $slot) {
        $ignore_slot_id = 0;
        if (isset($booking) && $booking->theatre_id == $theatre_id && $booking->slot_id == $slot->slot_id) {
          $ignore_slot_id = $booking->slot_id;
        }
        if ($ignore_slot_id > 0) {
          $slot['isSlotBookedOrLapsed'] = 0;
        } else {
          $slot['isSlotBookedOrLapsed'] = $this->bookingRepo->isSlotAvailable(
            $theatre_id,
            $slot->slot_id,
            $slot->slot->start_time,
            $selected_date
          );
        }
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

  public function edit_remarks(int $booking_id)
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
    $data['pre_booking_remarks'] = $request->pre_booking_remarks;

    //$data['payment_screenshot'] = $request->payment_screenshot;

    //new time slot 
    //$data['new_starttime'] = $request->new_starttime;
    //$data['new_endttime'] = $request->new_endttime;

    //Name on cake 
    //$data['name_on_cake'] = $request->name_on_cake;

    //Cake extra amount 
    //$data['cake_extra_amount'] = $request->cake_extra_amount;

    //is cancelled 
    //$data['is_cancelled'] = $request->is_cancelled;

    //$data['total_amount'] = $request->total_amount;

    Booking::find($request->booking_id)->update($data);
    
    return redirect()->route('admin.booking')->with('success', 'Remarks Updated Successfully');
  }

  public function booking_cancel_view($booking_id, $nav_type)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($booking_id == NULL || $booking_id == 0) {
      return redirect()->back();
    }

    $booking = Booking::with(['slot'])->where('id', '=', $booking_id)->first();

    if ($booking == NULL || !isset($booking->id)) {
      return redirect()->back();
    }

    $data['booking'] = $booking;
    $data['nav_type'] = $nav_type;

    return view('booking.admin_booking_cancel', $data);
  }

  public function booking_cancel(Request $request)
  {
    $data['remarks_or_notes'] = $request->remarks_or_notes;
    $data['booking_status'] = Helper::BOOKING_STATUS_CANCEL; //$request->is_cancelled;

    Booking::find($request->booking_id)->update($data);

    $nav_type = $request->nav_type;
    if ($nav_type == 1) {
      return redirect()->route('admin.dashboard')->with('success', 'Booking Cancelled Successfully');
    } else {
      return redirect()->route('admin.booking')->with('success', 'Booking Cancelled Successfully');
    }
  }

  public function booking_no_show(Request $request)
  {
    $data['booking_status'] = Helper::BOOKING_STATUS_NO_SHOW;

    Booking::find($request->booking_id)->update($data);

    return redirect()->back()->with('success', 'Booking marked as No-Show');
  }

  public function booking_refund_initiate_view(int $booking_id, int $nav_type)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($booking_id == NULL || $booking_id == 0) {
      return redirect()->back();
    }

    $booking = Booking::with(['payment'])->where('id', '=', $booking_id)->first();

    if ($booking == NULL || !isset($booking->id)) {
      return redirect()->back();
    }

    $data['booking'] = $booking;
    $data['nav_type'] = $nav_type;

    return view('booking.admin_refund_initiate', $data);
  }

  public function booking_refund_initiate(Request $request)
  {
    $request->validate([
      'booking_id' => 'required|integer',
      'refund_amount' => 'required|integer|min:1'
    ]);

    $data['remarks_or_notes'] = $request->remarks_or_notes;
    $data['booking_status'] = Helper::BOOKING_STATUS_REFUND_INIT;
    $data['refund_amount'] = $request->refund_amount;

    Booking::find($request->booking_id)->update($data);

    $nav_type = $request->nav_type;

    if ($nav_type == 1) {
      return redirect()->route('admin.dashboard')->with('success', 'Refund Updated Successfully');
    } else {
      return redirect()->route('admin.booking')->with('success', 'Refund Updated Successfully');
    }
  }

  public function booking_refund_complete(Request $request)
  {
    $data['booking_status'] = Helper::BOOKING_STATUS_REFUND_COMPLETE;

    Booking::find($request->booking_id)->update($data);

    return redirect()->back()->with('success', 'Record Updated Successfully');
  }

  public function booking_billing_edit(int $booking_id, int $nav_type)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($booking_id == NULL || $booking_id == 0) {
      return redirect()->back();
    }

    $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment', 'billing'])->where('id', '=', $booking_id)->first();

    if (!isset($booking)) {
      return redirect()->back();
    }
    $booking->theatre->makeHidden(['description', 'short_description', 'long_description']);

    if ($booking == NULL || !isset($booking->id)) {
      return redirect()->back();
    }

    $data['booking'] = $booking;
    $data['nav_type'] = $nav_type;

    return view('booking.admin_booking_billing', $data);
  }

  public function booking_billing_update(Request $request)
  {
    $request->validate([
      'booking_id' => 'required|integer',
      'extra_person_amount_overloaded' => 'required|integer|min:0',
      'upgrade_charge_amount' => 'required|integer|min:0',
      'cold_drink_qty' => 'required|integer|min:0',
      'cold_drink_unit_price' => 'required|integer|min:0',
      'water_bottle_250_qty' => 'required|integer|min:0',
      'water_bottle_250_unit_price' => 'required|integer|min:0',
      'water_bottle_500_qty' => 'required|integer|min:0',
      'water_bottle_500_unit_price' => 'required|integer|min:0',
      'water_bottle_1000_qty' => 'required|integer|min:0',
      'water_bottle_1000_unit_price' => 'required|integer|min:0',
      'extra_time_amount' => 'required|integer|min:0',
      'cleaning_charge_amount' => 'required|integer|min:0',
      'photo_print_amount' => 'required|integer|min:0',
      'food_total_amount' => 'required|integer|min:0',
      'special_discount_amount' => 'required|integer|min:0',
      'extra_charge_amount' => 'required|integer|min:0',
    ]);

    $isValidateOnly = $request->isValidateOnly;

    $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment', 'billing'])->where('id', '=', $request->booking_id)->first();

    if (!isset($booking)) {
      return redirect()->back();
    }
    $booking->theatre->makeHidden(['description', 'short_description', 'long_description']);

    if (!isset($booking)) {
      if ($isValidateOnly == 1) {
        return response()->json(['success' => false, "message" => "Booking not found"]);
      } else {
        return redirect()->back();
      }
    }

    $special_discount_amount = $request->special_discount_amount;
    $extra_person_amount_overloaded = $request->extra_person_amount_overloaded;
    $upgrade_charge_amount = $request->upgrade_charge_amount;

    $cold_drink_qty = $request->cold_drink_qty;
    $cold_drink_unit_price = $request->cold_drink_unit_price;
    $cold_drink_amount = $cold_drink_qty * $cold_drink_unit_price;

    $water_bottle_250_qty = $request->water_bottle_250_qty;
    $water_bottle_250_unit_price = $request->water_bottle_250_unit_price;
    $water_bottle_250_amount = $water_bottle_250_qty * $water_bottle_250_unit_price;

    $water_bottle_500_qty = $request->water_bottle_500_qty;
    $water_bottle_500_unit_price = $request->water_bottle_500_unit_price;
    $water_bottle_500_amount = $water_bottle_500_qty * $water_bottle_500_unit_price;

    $water_bottle_1000_qty = $request->water_bottle_1000_qty;
    $water_bottle_1000_unit_price = $request->water_bottle_1000_unit_price;
    $water_bottle_1000_amount = $water_bottle_1000_qty * $water_bottle_1000_unit_price;

    $extra_time_amount = $request->extra_time_amount;
    $cleaning_charge_amount = $request->cleaning_charge_amount;
    $photo_print_amount = $request->photo_print_amount;
    
    $gift_item = $request->gift_item;
    $drive_link = $request->drive_link;
    $verified_by = $request->verified_by;

    $food_total_amount = $request->food_total_amount;
    $extra_charge_amount = $request->extra_charge_amount;

    $billing_data['special_discount_amount'] = $special_discount_amount;
    $billing_data['extra_person_amount_overloaded'] = $extra_person_amount_overloaded;
    $billing_data['upgrade_charge_amount'] = $upgrade_charge_amount;
    $billing_data['cold_drink_qty'] = $cold_drink_qty;
    $billing_data['cold_drink_unit_price'] = $cold_drink_unit_price;
    $billing_data['cold_drink_amount'] = $cold_drink_amount;
    $billing_data['water_bottle_250_qty'] = $water_bottle_250_qty;
    $billing_data['water_bottle_250_unit_price'] = $water_bottle_250_unit_price;
    $billing_data['water_bottle_250_amount'] = $water_bottle_250_amount;
    $billing_data['water_bottle_500_qty'] = $water_bottle_500_qty;
    $billing_data['water_bottle_500_unit_price'] = $water_bottle_500_unit_price;
    $billing_data['water_bottle_500_amount'] = $water_bottle_500_amount;
    $billing_data['water_bottle_1000_qty'] = $water_bottle_1000_qty;
    $billing_data['water_bottle_1000_unit_price'] = $water_bottle_1000_unit_price;
    $billing_data['water_bottle_1000_amount'] = $water_bottle_1000_amount;
    $billing_data['extra_time_amount'] = $extra_time_amount;
    $billing_data['cleaning_charge_amount'] = $cleaning_charge_amount;
    $billing_data['photo_print_amount'] = $photo_print_amount;
    $billing_data['food_total_amount'] = $food_total_amount;
    $billing_data['extra_charge_amount'] = $extra_charge_amount;
    
    $billing_data['gift_item'] = $gift_item;
    $billing_data['drive_link'] = $drive_link;
    $billing_data['verified_by'] = $verified_by;

    $billingTotalAmount = $extra_person_amount_overloaded + $upgrade_charge_amount + $cold_drink_amount + $water_bottle_250_amount + $water_bottle_500_amount + $water_bottle_1000_amount + $extra_time_amount + $cleaning_charge_amount + $photo_print_amount + $food_total_amount + $extra_charge_amount;

    $booking_data['billing_total_amount'] = $billingTotalAmount;
    $booking_data['remarks_or_notes'] = $request->remarks_or_notes;

    if ($isValidateOnly == 1) {

      $billing = $this->getBillingData($booking, $billingTotalAmount, $special_discount_amount, $billing_data);
      $html = view('billing_summary', compact('billing'))->render();
      $data['html'] = $html;

      return response()->json(['success' => true, 'data' => $data]);
    }

    try {
      return DB::transaction(function () use ($request, $booking, $billing_data, $booking_data) {
        Booking::find($request->booking_id)->update($booking_data);

        BookingBilling::updateOrCreate(
          ['booking_id' => $request->booking_id], // Search criteria
          $billing_data // Values to update/create
        );

        $nav_type = $request->nav_type;
        if ($nav_type == 1) {
          return redirect()->route('admin.dashboard')->with('success', 'Billing Updated Successfully');
        } else {
          return redirect()->route('admin.booking')->with('success', 'Billing Updated Successfully');
        }
      });
    } catch (Exception $e) {
      return redirect()->back()->withInput()->withErrors(['msg' => $e->getMessage()]);
    }
  }

  public function getBillingData($booking, int $billingTotalAmount, int $specialDiscountAmount, $billingData = NULL)
  {
    $branch_cake = NULL;
    if ($booking->cake_id != NULL) {
      $branch_cake = branch_cake::where(["branch_id" => $booking->theatre->branch_id, "cake_id" => $booking->cake_id])->first();
    }

    $is_package = $booking->package_id != NULL && $booking->package_id > 0;

    $baseAmount = 0;
    $extraPersonAmount = 0;
    $decorationAmount = 0;
    $cakeAmount = 0;
    $cakeExtraAmount = $booking->cake_extra_amount ?? 0;
    $addOnTotalAmount = 0;
    $discountAmount = 0;
    $subTotalAmount = 0;
    $balanceAmount = 0;
    $advancePaidAmount = $booking->payment?->amount ?? 0;
    $collectedAmount = $booking->billing_paid_amount ?? 0;
    $shortDurationDiscountAmount = $booking->short_duration_discount_amount;

    $persons_allowed = Helper::getAmountForBilling($booking->theatre->peopleallowed, $booking->persons_allowed);
    
 
    if ($is_package) {
      $baseAmount = Helper::getAmountForBilling($booking->package->package_amount, $booking->billing?->base_amount);
      $cakeAmount = $booking->cake_amount;
     $extra_person_price =  Helper::getAmountForBilling($booking->package->extra_person_charge, $booking->billing?->extra_person_price);
       
    } 
    else 
    {
      $baseAmount = Helper::getAmountForBilling($booking->theatre->price, $booking->billing?->base_amount);
      if ($booking->decoration_id != NULL && $booking->theatre->decoration_included != 1) 
      {
        $decorationAmount = Helper::getAmountForBilling($booking->theatre->branch_data->decoration_amount, $booking->billing?->decoration_amount);
      }
      if (isset($booking->cake_id) && $booking->cake_id != NULL && $booking->cake_id > 0) {
        $cakeAmount = $branch_cake->price;
      }
      $cakeAmount = Helper::getAmountForBilling($cakeAmount, $booking->cake_amount);
      $extra_person_price =  Helper::getAmountForBilling($booking->theatre->extra_person_price, $booking->billing?->extra_person_price);
    }

    $extra_persons = 0;
    if ($booking->No_people > $persons_allowed) {
      $extra_persons = $booking->No_people - $persons_allowed;
      $extraPersonAmount =  $extra_person_price * $extra_persons;
      $extraPersonAmount = Helper::getAmountForBilling($extraPersonAmount, $booking->billing?->extra_person_amount);
    }

    $addOnsWithZeroAmount = [];
    $addOnsWithAmount = [];
    if (isset($booking->addons) && count($booking->addons) > 0) {
      foreach ($booking->addons as $addon) {
        $addOnTotalAmount = $addOnTotalAmount + $addon->amount;
        if ($addon->amount == 0) {
          $addOnsWithZeroAmount[] = $addon->addon->name;
        } else {
          $addOnsWithAmount[] = $addon->addon->name;
        }
      }
    }

    if (isset($booking->discountid) && $booking->discountid != NULL && $booking->discountid > 0) {
      $couponCode = Discount::where(['discount_id' => $booking->discountid])->first();
      if (isset($couponCode)) {
        if ($couponCode->discount_type == "FLAT") {
          $discountAmount = $couponCode->discount;
        } else if ($couponCode->discount_type == "PERCENTAGE") {
          $discountAmount = $baseAmount * ($couponCode->discount / 100);
        }
        $discountAmount = Helper::getAmountForBilling($booking->discount_amount, $booking->billing?->extra_person_amount);
      }
    }

    $subTotalAmount = ($baseAmount + $extraPersonAmount + $decorationAmount + $cakeAmount + $cakeExtraAmount + $addOnTotalAmount + $billingTotalAmount);

    $totalAmount = $subTotalAmount - $discountAmount - $specialDiscountAmount;
    $balanceAmount = $totalAmount - $advancePaidAmount - $collectedAmount - $shortDurationDiscountAmount;

    $billing['base_amount'] = $baseAmount;
    $billing['persons_allowed'] = $persons_allowed;
    $billing['extra_persons'] = $extra_persons;
    $billing['extra_person_price'] = $extra_person_price;
    $billing['decoration_amount'] = $decorationAmount;
    $billing['extra_person_amount'] = $extraPersonAmount;
    $billing['discount_amount'] = $discountAmount;
    $billing['sub_total'] = $subTotalAmount;
    $billing['total'] = $totalAmount;
    $billing['collected_amount'] = $collectedAmount;
    $billing['balance_amount'] = $balanceAmount;
    $billing['cake_amount'] = $cakeAmount;
    $billing['cake_extra_amount'] = $cakeExtraAmount;
    $billing['advance_amount'] = $advancePaidAmount;
    $billing['addon_total_amount'] = $addOnTotalAmount;
    $billing['short_duration_discount_amount'] = $shortDurationDiscountAmount;
    $addOn['addOnsWithZeroAmount'] = $addOnsWithZeroAmount;
    $addOn['addOnsWithAmount'] = $addOnsWithAmount;
    $billing['add_on_data'] = $addOn;
    if (isset($billingData)) {
      $billing['billing_data'] = $billingData;
    } else {
      $billing['billing_data'] = new BookingBilling();
    }

    return json_decode(json_encode($billing));
  }

  public function booking_billing_colllect_amount(int $booking_id, int $nav_type)
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
    if ($booking_id == NULL || $booking_id == 0) {
      return redirect()->back();
    }

    $userId = session()->get('user_id', 0);
    $user =  User::where('admin_id', $userId)->first();
    $userName = $user?->username;
    $userType = $user?->admintype;

    $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon', 'payment', 'billing'])->where('id', '=', $booking_id)->first();

    if (!isset($booking)) {
      return redirect()->back();
    }
    $booking->theatre->makeHidden(['description', 'short_description', 'long_description']);

    if ($booking == NULL || !isset($booking->id)) {
      return redirect()->back();
    }

    $data['booking'] = $booking;
    $data['nav_type'] = $nav_type;
    $data['isSuperAdmin'] = $userType == "Owner";

    $billingTotalAmount = Helper::getZeroIfNotSet($booking->billing_total_amount);
    $special_discount_amount = Helper::getZeroIfNotSet($booking->billing?->special_discount_amount);
    $billing = $this->getBillingData($booking, $billingTotalAmount, $special_discount_amount, $booking->billing);

    $data['amount_data'] = $billing;
    $html = view('billing_summary', compact('billing'))->render();
    $data['html'] = $html;

    return view('booking.admin_booking_collect_amount', $data);
  }

  public function booking_billing_colllect_amount_update(Request $request)
  {
    $rules = [
      'booking_id' => 'required|integer',
      'collect_amount' => 'required|integer|min:1',
      'payment_screen_shot' => 'nullable|file|image|mimes:jpeg,gif,png,jpg,webp,pdf|max:4096'
    ];

    $request->validate($rules);

    $paymentScreenshotPath = NULL;
    if ($request->hasFile('payment_screen_shot')) {
      $file = $request->file('payment_screen_shot');
      $filePrefix =  $request->booking_id . "_" . $request->collect_amount;
      $uploadPath = $this->getUploadPath() . "/" . $request->payment_type;
      $fileName = $filePrefix . "_" . strtotime("now") . '.' . $file->getClientOriginalExtension();
      $filePath = $file->storeAs($uploadPath, $fileName, 'public');
      //$filePath = $file->storeAs($this->getUploadPath(), $fileName);
      //$filePath = $file->store($this->getUploadPath(), 'public');
      $paymentScreenshotPath = $filePath; // asset('storage/' . $filePath);
    }

    $data['billing_paid_amount'] = $request->collect_amount_prev +  $request->collect_amount;
    $data['payment_screenshot'] = $paymentScreenshotPath;
    $data['payment_reference'] = $request->payment_reference;
    //$data['payment_type'] = $request->payment_type; updated to ensure the advance and actual amounts are at different places
    $data['remarks_or_notes'] = $request->remarks_or_notes;
    
    $userId = session()->get('user_id', 0);
    $user =  User::where('admin_id', $userId)->first();
    $userName = $user?->username;
    $data['amount_confirmed_by'] =  $userName;

    Booking::find($request->booking_id)->update($data);

    $nav_type = $request->nav_type;

    if ($nav_type == 1) {
      return redirect()->route('admin.dashboard')->with('success', 'Record Updated Successfully');
    } else {
      return redirect()->route('admin.booking')->with('success', 'Record Updated Successfully');
    }
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