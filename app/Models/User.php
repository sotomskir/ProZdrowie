<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'sex', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }

    public function getBmiAttribute()
    {
        return $this->weight / (pow($this->height, 2));
    }

    public function getHeightAttribute()
    {
        return $this->measurements->last()->height;
    }

    public function getWeightAttribute()
    {
        return $this->measurements->last()->weight;
    }

    public function getWeightDiffAttribute()
    {
        return $this->weight - $this->measurements->first()->weight;
    }

    public function ppm()
    {
        if ($this->sex == 1) {
            return 66.5 + (13.75 * $this->weight) + (5.003 * $this->height * 100) - (6.77 * $this->age);
        }

        return 655.1 + (9.563 * $this->weight) + (1.85 * $this->height * 100) - (4.676 * $this->age);
    }

    public function cmp()
    {
        return $this->ppm() * $this->pal;
    }

}
