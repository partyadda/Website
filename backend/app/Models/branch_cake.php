<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch_cake extends Model
{
    // use HasFactory;
    protected $table = 'branch_cake';

  public function cake()
    {
        return $this->belongsTo(cake::class, 'cake_id');
    }

    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_id');
    }
}