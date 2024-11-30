<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theater extends Model
{
    protected $primaryKey = 'theater_id';

    protected $fillable = [
        'theater_name',
        'capacity',
    ];

    public function sessions()
    {
        return $this->hasMany(showtime::class);
    }

    public function seat()
    {
        return $this->hasMany(seat::class, 'theater_id');
    }

    use HasFactory;
}