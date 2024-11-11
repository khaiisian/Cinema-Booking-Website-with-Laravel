<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = [
        'booking_time',
        'booking_date',
        'booking_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function session()
    {
        return $this->belongsTo(session::class);
    }

    public function booking_seat()
    {
        return $this->hasMany(booking_seat::class);
    }

    use HasFactory;
}