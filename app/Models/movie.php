<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\genre;

class movie extends Model
{

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'movie_title',
        'movie_content',
        'movie_duration',
        'movie_status',
    ];

    public function mgenre()
    {
        return $this->hasMany(genre_movie::class);
    }

    public function genres()
    {
        return $this->belongsToMany(genre::class, 'genre_movies', 'movie_id', 'genre_id');
    }

    public function sessions()
    {
        return $this->hasMany(session::class);
    }
    use HasFactory;
}