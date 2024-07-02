<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $guerded = [];

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
