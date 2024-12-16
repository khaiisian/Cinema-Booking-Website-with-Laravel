<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class booking extends Model
{
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'booking_code',
        'booking_status',
        'total_price',
        'u_id',
        'showtime_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function showtimes()
    {
        return $this->belongsTo(showtime::class, 'showtime_id', 'showtime_id');
    }

    public function booking_seat()
    {
        return $this->hasMany(booking_seat::class);
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'booking_seats', 'booking_id', 'seat_id');
    }

    public static function bookingCode()
    {
        // do {
        //     $code = 'BCode_' . Str::lower(Str::random(7));  // Adding 'B' prefix
        // } while (self::where('booking_code', $code)->exists());

        $code = 'B' . Str::substr(uniqid(), 0, 8);
        return $code;
    }


    use HasFactory;
}