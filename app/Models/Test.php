<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'words' => 'array',
            'images' => 'array',
        ];
    }

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
        return $this->belongsToMany(Rating::class, 'ratings');
    }
}
