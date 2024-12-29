<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class seat_type extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'seat_type_id';
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