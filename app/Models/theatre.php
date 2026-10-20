<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theatre extends Model
{
    // use HasFactory;
    protected $table = 'theatre';

    public function assets()
    {
        return $this->hasMany(asset::class, 'lookup_id', 'id');
    }

  public function theatre_assets()
  {
    return $this->hasMany(asset::class, 'lookup_id', 'id')->where(['lookup_data' => 'theatre', 'enabled' => 1]);
  }
    
    public function branchs()
    {
        return $this->belongsTo(branch::class, 'branch_id');   
    }
    // public function slots()
    // {
    //     return $this->belongsToMany(slot::class, 'theatre_slot','slot_id');
    // }
    
     public function slots()
    {
        return $this->belongsToMany(slot::class, 'theatre_slot', 'theatre_id', 'slot_id');
    }

  public function packages()
  {
    return $this->hasMany(Package::class, 'theatre_id', 'id')->where(['active' => 1]);
  }

  // public function slots()
  // {
  //     // return $this->belongsToMany(slot::class, 'theatre_slot', 'theatre_id', 'slot_id')
  //     //           ->withPivot('enabled', 'sequence') // Include pivot columns
  //     //             ->wherePivot('enabled', 1); // Filter by enabled slots

  //      return $this->belongsToMany(slot::class, 'theatre_slot', 'theatre_id', 'slot_id'); // Filter by enabled slots
  //             //      return $this->belongsToMany(slot::class, 'theatre_slot', 'theatre_id', 'slot_id')
  //             //   ->withPivot('enabled', 'sequence') // Include pivot columns
  //             //     ->wherePivot('enabled', 1); // Filter by enabled slots
  // }
}