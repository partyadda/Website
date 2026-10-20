<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class decoration extends Model
{
    // use HasFactory;
    protected $table = 'addon';
  protected $hidden = ['created_at', 'updated_at'];

  public function branches()
    {
        return $this->belongsToMany(branch::class, 'branch_addons', 'addon_id', 'branch_id')
        ->withPivot('price');
    }
}