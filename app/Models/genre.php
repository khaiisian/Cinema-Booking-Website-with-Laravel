<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\genre_movie;
use App\Models\movie;

class genre extends Model
{

    protected $primaryKey = 'genre_id';

    protected $fillable = ['genre'];

    public function mgenre()
    {
        return $this->hasMany(genre_movie::class);
    }

    //     $item = App\Models\Item::with('categories')->first();
// $item->categories;

    public function movies()
    {
        return $this->belongsToMany(movie::class, 'genre_movies', 'movie_id', 'genre_id');
    }

    use HasFactory;
}