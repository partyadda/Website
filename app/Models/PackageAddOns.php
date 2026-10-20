<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageAddOns extends Model
{
  protected $table = 'package_addons';

  protected $hidden = ['created_at', 'updated_at'];

  public function addon()
  {
    return $this->belongsTo(AddOn::class, 'addon_id', 'id')->with('asset');
  }
}