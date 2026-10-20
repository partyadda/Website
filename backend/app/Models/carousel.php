<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carousel extends Model
{
    // use HasFactory;
    protected $table = 'carousel';


    public function theatre()
    {
        return $this->belongsTo(theatre::class, 'theatre_id', 'id');
    }
}
