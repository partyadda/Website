<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Models\Package;
use App\Models\booking;
use App\Models\theatre_slot;
use App\Models\PackageTheatre;
use App\Models\branch_cake;
use App\Models\Discount;
use App\Models\BookingBilling;

class PackageRepo
{
  public function getPackgeById($id)
  {
      
   // return Package::with(['branch', 'theatre', 'decoration', 'package_decorations', 'package_cakes', 'package_addons'])->find($id);
    
    
    return Package::with([
    'branch',
    'theatre',
    'decoration',
    'package_decorations',
    'package_cakes' => function ($query) {
        $query->where('active', 1)
              ->whereHas('cake', function ($cakeQuery) {
                  $cakeQuery->where('website', 1);
              })
              ->with('cake.asset');
    },
    'package_addons',
])->find($id);
    
 //   return Package::with([    'branch',    'theatre',    'decoration',    'package_decorations',    'package_cakes' => function ($query) {        $query->where('active', 1)->with('cake.asset');    },    'package_addons',])->find($id);


    //return Package::with(['branch', 'theatre', 'decoration', 'package_theaters', 'package_decorations', 'package_cakes', 'package_addons'])->find($id);
    
   // return Package::with(['branch',  'theatre',    'decoration',    'package_decorations',    'package_cakes' => fn ($query) => $query->inRandomOrder()->limit(5),    'package_addons',])->find($id);

  }

  public function getTheatreSlots($theatre_id)
  {
    return theatre_slot::where([['theatre_id', '=', $theatre_id], ['enabled', '=', '1']])->with('slot')->orderBy('sequence')->get();
  }

  public function isSlotAvailable($theatre_id, $slot_id, $slot_start_time, $selected_date)
  {
    // $booking = booking::where([['theatre_id', '=', $theatre_id], ['slot_id', '=', $slot_id], ['booking_status', '=', '1'], ['date', '=', $selected_date]])->get();
    $booking = booking::where([
      ['theatre_id', '=', $theatre_id],
      ['slot_id', '=', $slot_id],
      ['date', '=', $selected_date]
    ])->whereIn('booking_status', Helper::BOOKING_STATUS_CHECK_ARRAY)->get();

//$checkForExisting = booking::where(['theatre_id' => $bookingData->theater_id,'booking_status' => '1', 'slot_id' => $bookingData->theater_slot_id, 'date' => $bookingSlotDate
//])->where('is_cancelled', '!=', '1')->get();


    $isSlotBookedOrLapsed = 0;

    if ($booking != NULL && count($booking) > 0) {
      $isSlotBookedOrLapsed = 1;
    }

    if ($isSlotBookedOrLapsed == 0) {
      $currentDateTime = date('Y-m-d H:i:s');
      $slotDateTime = date('Y-m-d H:i:s', strtotime($selected_date . " " . $slot_start_time));

      if (strtotime($slotDateTime) <= strtotime($currentDateTime)) {
        $isSlotBookedOrLapsed = 1;
      }
    }

    return $isSlotBookedOrLapsed;
  }

  function getPackageBookingSession()
  {
    return json_decode(session('package_booking'));
  }

  function setPackageBookingSession($bookingData)
  {
    session(['package_booking' => json_encode($bookingData)]);
  }

  function resetPackageBookingSession()
  {
    session()->forget(['package_booking']);
  }

  function updateBilling(int $booking_id)
  {
    $booking = Booking::with(['theatre', 'cake', 'decoration', 'addons.addon', 'payment', 'package'])->where('id', '=', $booking_id)->first();

    $data['is_package'] = $is_package = $booking->package_id != NULL && $booking->package_id > 0;
    $branch_cake = NULL;
    if ($booking->cake_id != NULL) {
      $branch_cake = branch_cake::where(["branch_id" => $booking->theatre->branch_id, "cake_id" => $booking->cake_id])->first();
    }

    $is_package = $booking->package_id != NULL && $booking->package_id > 0;
    $baseAmount = 0;
    $extraPersonAmount = 0;
    $decorationAmount = 0;
    $cakeAmount = 0;
    $cakeExtraAmount = 0;
    $addOnTotalAmount = 0;
    $discountAmount = 0;
    $subTotalAmount = 0;
    $balanceAmount = 0;
    $advancePaidAmount = $booking->payment?->amount ?? 0;
    $shortDurationDiscountAmount = 0;

    $persons_allowed = Helper::getAmountForBilling($booking->theatre->peopleallowed, $booking->persons_allowed);
    $extra_person_price =  Helper::getAmountForBilling($booking->theatre->extra_person_price, $booking->billing?->extra_person_price);

    if ($is_package) {
      $baseAmount = Helper::getAmountForBilling($booking->package->package_amount, $booking->billing?->base_amount);
      $cakeAmount = $booking->cake_amount;
    } else {
      $baseAmount = Helper::getAmountForBilling($booking->theatre->price, $booking->billing?->base_amount);
      if ($booking->decoration_id != NULL && $booking->theatre->decoration_included != 1) {
        $decorationAmount = Helper::getAmountForBilling($booking->theatre->branch_data->decoration_amount, $booking->billing?->decoration_amount);
      }
      if (isset($booking->cake_id) && $booking->cake_id != NULL && $booking->cake_id > 0) {
        $cakeAmount = $branch_cake->price;
      }
      $cakeAmount = Helper::getAmountForBilling($cakeAmount, $booking->cake_amount);
    }
    if ($booking->No_people > $persons_allowed) {
      $extraPersonAmount =  $extra_person_price * ($booking->No_people - $persons_allowed);
      $extraPersonAmount = Helper::getAmountForBilling($extraPersonAmount, $booking->billing?->extra_person_amount);
    }

    if (isset($booking->addons) && count($booking->addons) > 0) {
      foreach ($booking->addons as $addon) {
        $addOnTotalAmount = $addOnTotalAmount + $addon->amount;
      }
    }

    if (isset($booking->theatre->Percentage) && $booking->theatre->Percentage <= 99) {
      $shortDurationDiscountAmount = (ceil($baseAmount * ($booking->theatre->Percentage / 100))) - $baseAmount;
    }

    if (isset($booking->discountid) && $booking->discountid != NULL && $booking->discountid > 0) {
      $couponCode = Discount::where(['discount_id' => $booking->discountid])->first();
      if (isset($couponCode)) {
        if ($couponCode->discount_type == "FLAT") {
          $discountAmount = $couponCode->discount;
        } else if ($couponCode->discount_type == "PERCENTAGE") {
          $discountAmount = $baseAmount * ($couponCode->discount / 100);
        }
      }
    }

    $subTotalAmount = $baseAmount + $extraPersonAmount + $cakeAmount + $cakeExtraAmount + $addOnTotalAmount + $decorationAmount;

    $balanceAmount = $subTotalAmount - $advancePaidAmount - $discountAmount - $shortDurationDiscountAmount;

    $booking_data['final_price'] = $balanceAmount;
    $booking_data['cake_amount'] = $cakeAmount;
    $booking_data['total_amount'] = $subTotalAmount;
    $booking_data['discount_amount'] = $discountAmount;
    $booking_data['persons_allowed'] = $persons_allowed;
    $booking_data['persons_allowed'] = $persons_allowed;
    $billing_data['short_duration_discount_amount'] = $shortDurationDiscountAmount;

    Booking::find($booking_id)->update($booking_data);

    BookingBilling::updateOrCreate(
      ['booking_id' => $booking_id], // Search criteria
      ['base_amount' =>  $baseAmount, 'extra_person_price' => $extra_person_price, 'extra_person_amount' => $extraPersonAmount, 'decoration_amount' => $decorationAmount, 'addon_total_amount' => $addOnTotalAmount] // Values to update/create
    );
  }
}