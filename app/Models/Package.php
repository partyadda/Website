<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $table = 'package';

  protected $hidden = ['created_at', 'updated_at'];

  public function branch()
  {
    return $this->belongsTo(branch::class, 'branch_id', 'id');
  }

  public function theatre()
  {
    return $this->belongsTo(theatre::class, 'theatre_id', 'id')->with('theatre_assets');
  }

  public function decoration()
  {
    return $this->belongsTo(occasion::class, 'decoration_id', 'id')->with('asset');
  }

  public function package_theaters()
  {
    return $this->hasMany(PackageTheatre::class, 'package_id', 'id')->with('theatre')->where('active', 1)->orderBy('sequence');
  }

  public function package_decorations()
  {
    return $this->hasMany(PackageDecoration::class, 'package_id', 'id')->with('decoration')->where('active', 1)->orderBy('sequence');
  }

  public function package_cakes()
  {
    return $this->hasMany(PackageCakes::class, 'package_id', 'id')->with('cake')->where('active', 1)->orderBy('sequence');
  }

  public function package_addons()
  {
    return $this->hasMany(PackageAddOns::class, 'package_id', 'id')->with('addon')->where('active', 1)->orderBy('sequence');
  }

  public function package_assets()
  {
    return $this->hasMany(asset::class, 'lookup_id', 'id')->where(['lookup_data' => 'package', 'enabled' => 1])->orderBy('sequenceno');
  }
}