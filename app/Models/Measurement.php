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


    public function bmi()
    {
        return $this->weight / (pow($this->height, 2));
    }

    public function ppm()
    {
        if($this->sex == 1) {
            return 66.5 + (13.75 * $this->weight) + (5.003 * $this->height * 100) - (6.77 * $this->age);
        }

        return 655.1 + (9.563 * $this->weight) + (1.85 * $this->height * 100) - (4.676 * $this->age);
    }

    public function cmp()
    {
        return $this->ppm() * $this->pal;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getPal()
    {
        return $this->pal;
    }

}
