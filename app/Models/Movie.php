<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movies';

    protected $fillable = [
        'name',
        'release_date',
        'synopsis',
        'duration',
        'image',
        'genre',
    ];

    protected $hidden = [
        "updated_at",
        "deleted_at",
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class,'movie_id');
    }

//score average
}
