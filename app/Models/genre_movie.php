<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre_movie extends Model
{
    public function genre()
    {
        return $this->belongsTo(genre::class);
    }

    public function movie()
    {
        return $this->belongsTo(movie::class);
    }

    use HasFactory;
}