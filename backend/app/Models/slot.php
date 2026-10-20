<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slot extends Model
{
    // use HasFactory;
    protected $table = 'slot';
    
    
    // public function theatres()
    // {
    //     return $this->belongsToMany(theatre::class, 'theatre_slot', 'slot_id', 'theatre_id'); // Filter by enabled theatres
                    
    //                 //   return $this->belongsToMany(theatre::class, 'theatre_slot', 'slot_id', 'theatre_id')
    //                 // ->withPivot('enabled', 'sequence') // Include pivot columns
    //                 // ->wherePivot('enabled', 1); // Filter by enabled theatres
    // }
    
    //  public function theatres()
    // {
    //     return $this->belongsToMany(theatre::class, 'theatre_slot','slot_id');
    // }
    
    public function theatres()
    {
        return $this->belongsToMany(theatre::class, 'theatre_slot', 'slot_id', 'theatre_id')->withPivot('enabled', 'sequence');
    }
}
