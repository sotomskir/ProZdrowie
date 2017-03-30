<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DictValue extends Model
{
    protected $table = 'dict_values';

    public function dict()
    {
        return $this->belongsTo(Dict::class);
    }
}
