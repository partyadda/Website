<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTheatre extends Model
{
  protected $table = 'package_theater';

  protected $hidden = ['created_at', 'updated_at'];

  public function theatre()
  {
    return $this->belongsTo(theatre::class, 'theatre_id', 'id')->with('theatre_assets');
  }
}