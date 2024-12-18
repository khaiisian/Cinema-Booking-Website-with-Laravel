<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    use SoftDeletes;
    protected $primaryKey = 'u_id';

    protected $fillable = [
        'u_code',
        'u_name',
        'email',
        'password',
        'acc_name',
        'u_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_type()
    {
        return $this->belongsTo(user_type::class);
    }

    public function contactus()
    {
        return $this->hasMany(contactus::class);
    }

    public function booking()
    {
        return $this->hasMany(booking::class);
    }

    public static function userCode()
    {
        // do {
        //     $code = 'BCode_' . Str::lower(Str::random(7));  // Adding 'B' prefix
        // } while (self::where('booking_code', $code)->exists());

        $code = 'U_' . Str::substr(uniqid(), 0, 8);
        return $code;
    }
}