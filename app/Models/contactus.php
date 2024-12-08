<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
    protected $table = 'contactus';
    protected $fillable = [
        'contact_title',
        'contact_msg',
        'u_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}