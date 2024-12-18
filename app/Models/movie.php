<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\genre;
use Illuminate\Database\Eloquent\SoftDeletes;

class movie extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'movie_title',
        'movie_content',
        'movie_duration',
        'movie_status',
        'movie_image',
        'release_date',
        'age_rating',
    ];

    public function mgenre()
    {
        return $this->hasMany(genre_movie::class);
    }

    public function genres()
    {
        return $this->belongsToMany(genre::class, 'genre_movies', 'movie_id', 'genre_id');
    }

    public function showtimes()
    {
        return $this->hasMany(showtime::class, 'movie_id', 'movie_id');
    }
    use HasFactory;
}