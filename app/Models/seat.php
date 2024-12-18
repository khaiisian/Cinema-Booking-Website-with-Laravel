<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class seat extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'seat_id';
    protected $fillable = [
        'seat_code'
    ];

    public function seat_type()
    {
        return $this->belongsTo(seat_type::class, 'seat_type_id', 'seat_type_id');
    }

    public function theater()
    {
        return $this->belongsTo(theater::class, 'theater_id');
    }

    public function booking_seat()
    {
        return $this->hasMany(booking_seat::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(booking::class, 'booking_seats', 'seat_id', 'booking_id');
    }

    use HasFactory;
}