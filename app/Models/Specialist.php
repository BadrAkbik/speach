<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function trainees()
    {
        return $this->morphMany(Trainee::class, 'trainer');
    }
}
