<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_addon extends Model
{
    // use HasFactory;
    protected $table = "booking_addon";
      protected $guarded = ['id'];

    
    public function addon()
    {
        return $this->belongsTo(decoration::class, 'addon_id', 'id');
    }
}
