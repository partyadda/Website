<?php

namespace App\Repositories;

use App\Models\Package;
use App\Models\booking;
use App\Models\theatre_slot;
use App\Models\PackageTheatre;

class PackageRepo
{
  public function getPackgeById($id)
  {
    return Package::with(['branch', 'theatre', 'decoration', 'package_decorations', 'package_cakes', 'package_addons'])->find($id);
    //return Package::with(['branch', 'theatre', 'decoration', 'package_theaters', 'package_decorations', 'package_cakes', 'package_addons'])->find($id);
  }

  public function getTheatreSlots($theatre_id)
  {
    return theatre_slot::where([['theatre_id', '=', $theatre_id], ['enabled', '=', '1']])->with('slot')->orderBy('sequence')->get();
  }

  public function isSlotAvailable($theatre_id, $slot_id, $slot_start_time, $selected_date)
  {
    $booking = booking::where([['theatre_id', '=', $theatre_id], ['slot_id', '=', $slot_id], ['booking_status', '=', '1'], ['date', '=', $selected_date]])->get();

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
}