<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    protected $table = 'dicts';

    public function values()
    {
        return $this->hasMany(DictValue::class);
    }
}
