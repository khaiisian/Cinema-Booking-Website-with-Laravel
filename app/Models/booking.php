<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = [
        'booking_status',
        'total_price',
        'u_id',
        'showtime_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function session()
    {
        return $this->belongsTo(showtime::class);
    }

    public function booking_seat()
    {
        return $this->hasMany(booking_seat::class);
    }

    public function seats()
    {
        return $this->belongsToMany(seat::class, 'booking_seats', 'booking_id', 'seat_id');
    }
    use HasFactory;
}