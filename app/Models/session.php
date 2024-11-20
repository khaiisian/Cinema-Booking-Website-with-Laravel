<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $fillable = ['session_start', 'session_end', 'session_date'];
    public function movie()
    {
        return $this->belongsTo(movie::class, 'movie_id', 'movie_id');
    }

    public function theater()
    {
        return $this->belongsTo(theater::class, 'theater_id', 'theater_id');
    }

    public function booking()
    {
        return $this->hasMany(booking::class);
    }

    use HasFactory;
}