<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cake extends Model
{
    // use HasFactory;
    protected $table = 'cake';
    
    public function branches()
    {
        return $this->belongsToMany(branch::class, 'branch_cake', 'cake_id', 'branch_id')
        ->withPivot('price');
    }

  public function asset()
  {
    return $this->belongsTo(asset::class, 'id', 'lookup_id')->where(['lookup_data' => 'cake', 'enabled' => 1]);
  }
}