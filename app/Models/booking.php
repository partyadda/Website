<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
  protected $table = 'booking';

  public function customer()
  {
    return $this->belongsTo(customer::class, 'customer_id', 'id');
  }

  public function theatre()
  {
    return $this->belongsTo(theatre::class, 'theatre_id', 'id');
  }

  public function slot()
  {
    return $this->belongsTo(slot::class, 'slot_id', 'id');
  }

  public function cake()
  {
    return $this->belongsTo(cake::class, 'cake_id', 'id');
  }

  public function decoration()
  {
    return $this->belongsTo(occasion::class, 'decoration_id', 'id');
  }

  public function addons()
  {
    return $this->hasMany(booking_addon::class, 'booking_id', 'id');
  }

  public function payment()
  {
    return $this->hasOne(payment::class, 'bookingid');
  }
}