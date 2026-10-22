<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Models\branch;
use App\Models\booking;
use App\Models\theatre;
use App\Models\branch_cake;
use App\Models\BranchAddons;
use App\Models\occasion;
use App\Models\theatre_slot;
use App\Models\Package;
use App\Models\PackageAddOns;
use App\Models\PackageCakes;

class PackageCreateRepo
{

  public function getAllPacakges()
  {
    //'theatre', 'decoration', 'package_cakes', 'package_decorations', 'package_addons'
    return Package::with($this->getPackageWithArray())->get();
  }

  private function getPackageWithArray(bool $isEdit = false) 
  {
    return ['branch:id,branch_name', 'theatre:id,name', 'decoration:id,name'];
  }

  public function getBranches()
  {
    return branch::where(['enabled' => '1'])->where('id', '!=', '5')->get(['id', 'branch_name']);
  }

  public function getDecorations() 
  {
    return occasion::all(['id', 'name']);
  }

  public function getTheatreByBranch(int $branch_id)
  {
    return theatre::where(['branch_id' => $branch_id])->get(['id', 'name']);
  }

  public function getPackageById(int $id) 
  {
    return Package::with($this->getPackageWithArray())->find($id);
  }

  public function updatePackaage(int $package_id, array $data) 
  {
    Package::find($package_id)->update($data);
  }
}