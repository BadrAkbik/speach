<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guerded = [];

    public function videos()
    {
        return $this->morphMany(Video::class, 'watcher');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'test_id');
    }
}
