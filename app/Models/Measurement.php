<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{

    protected $fillable = [
        'height', 'weight', 'waist', 'biceps', 'hips', 'thigh', 'chest'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserIdAttribute($user_id)
    {
        return (int) $user_id;
    }
}
