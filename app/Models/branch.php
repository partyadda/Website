<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    // use HasFactory;
    protected $table = 'branch';
    
    public function city()
    {
        return $this->hasMany(city::class, 'city_id');
    }
    public function decorations()
    {
        return $this->belongsToMany(occasion::class, 'branch_decoration', 'branch_id', 'decoration_id');
    }
    
    public function cakes()
    {
        return $this->belongsToMany(cake::class, 'branch_cake', 'branch_id', 'cake_id')
        ->withPivot('price');
    }
    
     public function addons()
    {
        return $this->belongsToMany(decoration::class, 'branch_addons', 'branch_id', 'addon_id')
        ->withPivot('price');
    }
}
