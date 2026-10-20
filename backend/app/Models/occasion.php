<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class occasion extends Model
{
    // use HasFactory;
    protected $table = 'decoration';
  protected $hidden = ['created_at', 'updated_at'];

  public function branches()
    {
        return $this->belongsToMany(branch::class, 'branch_decoration', 'decoration_id', 'branch_id');
    }

  public function asset()
  {
    return $this->belongsTo(asset::class, 'id', 'lookup_id')->where(['lookup_data' => 'decoration', 'enabled' => 1]);
  }
}