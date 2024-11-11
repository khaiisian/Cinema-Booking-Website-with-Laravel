<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $fillable = [
        'movie_title',
        'movie_content',
        'movie_duration',
        'movie_status',
    ];

    public function mgenre()
    {
        return $this->hasMany(genre::class);
    }

    public function sessions()
    {
        return $this->hasMany(session::class);
    }
    use HasFactory;
}