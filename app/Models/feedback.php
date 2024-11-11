<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $fillable = [
        'feedback_title',
        'feedback_comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}