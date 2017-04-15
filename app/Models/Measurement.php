<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{

    protected $fillable = [
        'height', 'weight', 'pal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
