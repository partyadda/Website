<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    // use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'bookingid',
        'transactionid',
        'amount',
        'status',
        'paymentgateway',
        'response_msg',
        'providerReferenceId', // Add this line
        'merchantOrderId', // Add this line
        'checksum', // Add this line
         // Add this line
        // other fillable properties
    ];


}
