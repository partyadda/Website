<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    // use HasFactory;
    protected $table = 'admin';

    // If the primary key is not 'id', specify it like this:
    // protected $primaryKey = 'admin_id'; // adjust as necessary

    // Define any other fields you need for your admin model
    protected $fillable = [
        'email', 'password',
    ];

    // If you want to disable timestamps (created_at, updated_at)
    public $timestamps = true;

    
}
