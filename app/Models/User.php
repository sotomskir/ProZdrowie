<?php

namespace App\Models;

use App\Dictionaries\Sex;
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
        'first_name', 'last_name', 'sex', 'email', 'password', 'pal',
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
        /**
         * Gdyby tak się kiedyś stało, że pytając o "relację dynamiczną" ostatnich pomiarów.
         * Mamy do dyspozycji wszystkie pomiary usera, to zwróćmy ostaatni rekord z pomiarów,
         * bo sukcesywnie to ten sam rekord o jaki nam chodzi, teraz może nie ma sensu, ale
         * dobrze wiedzieć, że można tu dać jakaś logikę :)
         */
        if ($this->relationLoaded('measurements')) {
            return end($this->relations['measurements']);
        }

        return $this->hasOne(Measurement::class)->orderBy('id', 'desc');
    }

    public function getBmiAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->weight / (pow(($this->height / 100), 2));
    }

    public function getWeightAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['weight'];
    }

    public function getHeightAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['height'];
    }

    public function getWaistAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['waist'];
    }

    public function getHipsAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['hips'];
    }

    public function getBicepsAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['biceps'];
    }

    public function getThighAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['thigh'];
    }

    public function getChestAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->latestMeasurement['chest'];
    }

    public function getPpmAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        if($this->isMale()) {
            return 66.5 + (13.75 * $this->weight) + (5.003 * $this->height) - (6.77 * $this->age);
        }

        return 655.1 + (9.563 * $this->weight) + (1.85 * $this->height) - (4.676 * $this->age);
    }

    public function getWhrAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->waist / $this->hips;
    }

    public function getCmpAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->ppm * $this->pal;
    }

    public function getWeightDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->weight - $this->measurements->first()->weight;
    }

    public function getHeightDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->height - $this->measurements->first()->height;
    }

    public function getWaistDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->waist - $this->measurements->first()->waist;
    }

    public function getChestDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->chest - $this->measurements->first()->chest;
    }

    public function getBicepsDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->biceps - $this->measurements->first()->biceps;
    }

    public function getHipsDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->hips - $this->measurements->first()->hips;
    }

    public function getThighDiffAttribute()
    {
        if ($this->hasNoMeasurements()) return 0;

        return $this->thigh - $this->measurements->first()->thigh;
    }

    public function isFemale(): bool
    {
        return $this->sex === Sex::FEMALE;
    }

    public function isMale(): bool
    {
        return $this->sex === Sex::MALE;
    }

    public function hasAbdominalObesity(): bool
    {
        return $this->whr >= ($this->isMale() ? 1.0 : 0.85) || $this->waist > ($this->isMale() ? 102 : 88);
    }

    public function hasObesity()
    {
        return $this->bmi > 30;
    }

    /**
     * Daję access public, żeby można było wołać z presentera.
     */
    public function hasNoMeasurements(): bool
    {
        return !$this->latestMeasurement;
    }

}
