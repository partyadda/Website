<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decoration extends Model
{
    use HasFactory; // This line is optional but recommended for consistency

    protected $table = 'addon';

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branch_addons', 'addon_id', 'branch_id')
            ->withPivot('price');
    }
}