<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'extra_hero_images' => 'array',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
