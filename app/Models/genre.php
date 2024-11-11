<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\genre_movie;

class genre extends Model
{
    protected $fillable = ['genre'];

    public function mgenre()
    {
        return $this->hasMany(genre_movie::class);
    }
    use HasFactory;
}