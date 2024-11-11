<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seat_type extends Model
{
    protected $fillable = [
        'seat_type',
        'price',
    ];

    public function seat()
    {
        $this->hasMany(seat::class);
    }

    use HasFactory;
}