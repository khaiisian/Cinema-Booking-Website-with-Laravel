<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $fillable = ['session_time', 'session_date'];
    public function movie()
    {
        return $this->belongsTo(movie::class);
    }

    public function theater()
    {
        return $this->belongsTo(theater::class);
    }

    public function booking(){
        return $this->hasMany(booking::class);
    }

    use HasFactory;
}