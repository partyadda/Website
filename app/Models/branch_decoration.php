<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch_decoration extends Model
{
    // use HasFactory;
    protected $table = "branch_decoration";
    
    public function decoration()
    {
        return $this->belongsTo(occasion::class, 'decoration_id');
    }

    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_id');
    }
}