<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch_decoration_addon extends Model
{
    // use HasFactory;
    protected $table = "branch_addons";
    
    public function addon()
    {
        return $this->belongsTo(decoration::class, 'addon_id');
    }

    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_id');
    }
}
