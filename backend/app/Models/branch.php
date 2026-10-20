<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    // use HasFactory;
    protected $table = 'branch';
  protected $hidden = ['created_at', 'updated_at'];

  public function theatres()
    {
        return $this->hasMany(theatre::class, 'branch_id');
    }
    
    public function city()
    {
        return $this->belongsTo(city::class, 'city_id','id');
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

  public function branch_addons()
  {
    return $this->hasMany(BranchAddons::class, 'branch_id')->with('addon')->where(['enabled' => 1])->orderBy('sequence')->has('addon');
  }

  public function branch_decorations()
  {
    return $this->hasMany(branch_decoration::class, 'branch_id')->with('decoration')->where(['enabled' => 1])->orderBy('sequence')->has('decoration');
  }

  public function branch_cakes()
  {
    return $this->hasMany(branch_cake::class, 'branch_id')->with('cake')->orderBy('sequence')->has('cake');
    //->where(['enabled' => 1])
  }
}