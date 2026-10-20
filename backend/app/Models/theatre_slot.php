<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class theatre_slot extends Model
{
    
    // use SoftDeletes;

    // protected $dates = ['deleted_at'];
    // use HasFactory;
    protected $table = 'theatre_slot';

  public function slot()
  {
    return $this->belongsTo(slot::class, 'slot_id', 'id');
  }
}