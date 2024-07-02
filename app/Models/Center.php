<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $guerded = [];

    public function specialists()
    {
        return $this->hasMany(Specialist::class, 'specialist_id');
    }
}
