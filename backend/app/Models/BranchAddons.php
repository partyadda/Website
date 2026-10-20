<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchAddons extends Model
{
  protected $table = 'branch_addons';

  public function addon()
  {
    return $this->belongsTo(addon::class, 'addon_id')->where(['enabled' => 1]);
  }
}