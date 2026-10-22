<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\booking;

class BookingBilling extends Model
{
  protected $table = 'booking_billing';
  
  protected $guarded = ['id'];

  public function booking()
  {
    return $this->belongsTo(booking::class, 'booking_id', 'id');
  }
}