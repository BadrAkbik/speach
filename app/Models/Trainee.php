<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ratings()
    {
        return $this->belongsToMany(Rating::class, 'ratings');
    }

    public function trainer()
    {
        return $this->morphTo();
    }
    
}
