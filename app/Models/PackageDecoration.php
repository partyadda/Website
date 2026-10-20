<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDecoration extends Model
{
  protected $table = 'package_decoration';

  protected $hidden = ['created_at', 'updated_at'];

  public function decoration()
  {
    return $this->belongsTo(occasion::class, 'decoration_id', 'id')->with('asset');
  }
}