<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_type extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'u_type',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    use HasFactory;
}