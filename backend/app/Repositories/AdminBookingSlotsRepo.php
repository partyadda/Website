<?php

namespace App\Repositories;

use App\Models\branch;
use App\Models\booking;
use App\Models\theatre;
use App\Models\branch_cake;
use App\Models\BranchAddons;
use App\Models\theatre_slot;
use App\Models\Package;
use App\Models\PackageAddOns;
use App\Models\PackageCakes;
use App\Models\Discount;

class AdminBookingSlotsRepo {

  public function getAllCouponCodes($branchId)
  {
    return Discount::where(['enabled' => 1, "branch_id" => $branchId, ['valid_until', '>=', now()->format('Y-m-d')]])->get();
  }

  public function getAllTheatres($branchId)
  {
    return theatre::with(['packages'])->where(["branch_id" => $branchId])->get()->makeHidden(['description','long_description','short_description']);
  }

  public function getPackgeById($id)
  {
    return Package::with(['branch', 'theatre', 'decoration', 'package_cakes', 'package_addons'])->find($id)->makeHidden(['long_desc']);
  }

  public function geOnlyPackgeById($id)
  {
    return Package::find($id);
  }


  public function getTheatreById($theatre_id) 
  {
    return theatre::with(['branch'])->find($theatre_id)->makeHidden(['description','long_description','short_description']);
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

  public function getBranchCake($id)
  {
    return branch_cake::find($id);
  }

  public function getBranchAddons($idArray)
  {
    return BranchAddons::whereIn("id", $idArray)->get();
  }

  public function getPackageCake($id)
  {
    return PackageCakes::find($id);
  }

  public function getPackageAddons($idArray)
  {
    return PackageAddOns::whereIn("id", $idArray)->get();
  }
}