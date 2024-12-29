<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
    protected $table = 'contactus';
    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'contact_title',
        'contact_msg',
        'u_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id', 'u_id');
    }

    use HasFactory;
}