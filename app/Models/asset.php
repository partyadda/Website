<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    // use HasFactory;
    protected $table = 'asset';

  //  protected $guarded = ['id'];

  public function decoration()
    {
        // Join lookup_id in the asset table with decoration_id in the decoration table
        return $this->belongsTo(decoration::class, 'lookup_id', 'id');
    }
    
    public function cake()
    {
        // Join lookup_id in the asset table with decoration_id in the decoration table
        return $this->belongsTo(cake::class, 'lookup_id', 'id');
    }
    
    public function addon()
    {
        // Join lookup_id in the asset table with decoration_id in the decoration table
        return $this->belongsTo(addon::class, 'lookup_id', 'id');
  }
}