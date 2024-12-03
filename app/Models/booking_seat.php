<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_seat extends Model
{
    protected $table = 'booking_seats';
    public function booking()
    {
        return $this->belongsTo(booking::class);
    }

    public function seat()
    {
        return $this->belongsTo(seat::class);
    }

    use HasFactory;
}