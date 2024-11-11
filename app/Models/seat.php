<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seat extends Model
{
    protected $fillable = [
        'seat_code'
    ];

    public function seat_type()
    {
        return $this->belongsTo(seat_type::class);
    }

    public function theater()
    {
        return $this->belongsTo(theater::class);
    }

    public function booking_seat()
    {
        return $this->hasMany(booking_seat::class);
    }

    use HasFactory;
}