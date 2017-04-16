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

    protected $with = ['latestMeasurement'];


    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }

    public function latestMeasurement()
    {
        return $this->hasOne(Measurement::class)->orderBy('id', 'desc');
    }

    public function getBmiAttribute()
    {
        if (!$this->latestMeasurement) {
            return 0;
        }

        return $this->latestMeasurement['weight'] / (pow(($this->latestMeasurement['height'] / 100), 2));
    }

    public function getWeightAttribute()
    {
        if (!$this->latestMeasurement) {
            return 0;
        }

        return $this->latestMeasurement['weight'];
    }

    public function getHeightAttribute()
    {
        if (!$this->latestMeasurement) {
            return 0;
        }

        return $this->latestMeasurement['height'];
    }

    public function getPalAttribute()
    {
        if (!$this->latestMeasurement) {
            return 0;
        }

        return $this->latestMeasurement['pal'];
    }

    public function getPpmAttribute()
    {
        if($this->sex == 1) {
            return 66.5 + (13.75 * $this->weight) + (5.003 * $this->height) - (6.77 * $this->age);
        }

        return 655.1 + (9.563 * $this->weight) + (1.85 * $this->height) - (4.676 * $this->age);
    }

    public function getCmpAttribute()
    {
        return $this->ppm * $this->pal;
    }

    public function getWeightDiffAttribute()
    {
        if (!$this->latestMeasurement) {
            return 0;
        }

        return $this->weight - $this->measurements->first()->weight;
    }

}
