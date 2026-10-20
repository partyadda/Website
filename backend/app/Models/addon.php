<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addon extends Model
{
    // use HasFactory;
    protected $table = 'addon';
  protected $hidden = ['created_at', 'updated_at'];

  public function branches()
    {
        return $this->belongsToMany(branch::class, 'branch_cake', 'cake_id', 'branch_id')
        ->withPivot('price');
    }

  public function asset()
  {
    return $this->belongsTo(asset::class, 'id', 'lookup_id')->where(['lookup_data' => 'addon', 'enabled' => 1]);
  }
}