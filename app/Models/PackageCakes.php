<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageCakes extends Model
{
  protected $table = 'package_cake';

  protected $hidden = ['created_at', 'updated_at'];

  public function cake()
  {
    return $this->belongsTo(cake::class, 'cake_id', 'id')->with('asset');
  }
}