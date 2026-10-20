<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
  protected $table = 'addon';

  public function asset()
  {
    return $this->belongsTo(asset::class, 'id', 'lookup_id')->where(['lookup_data' => 'addon', 'enabled' => 1]);
  }
}