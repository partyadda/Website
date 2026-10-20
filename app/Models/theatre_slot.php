<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class theatre_slot extends Model
{
    // use HasFactory;
    protected $table = 'theatre_slot';

  public function slot()
  {
    return $this->belongsTo(slot::class, 'slot_id', 'id');
  }
}