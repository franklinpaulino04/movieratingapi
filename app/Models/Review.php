<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reviews';

    protected $fillable = [
        'movie_id',
        'score',
        'comment',
    ];

    protected $hidden = [
        "updated_at",
        "deleted_at",
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class,'id');
    }
}
