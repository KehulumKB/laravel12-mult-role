<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SubCity extends Model
{
    protected $guarded = [];

    public function kebeles(){
        return $this->hasMany(Kebele::class);
    }

    public function sub_city(){
        return $this->belongsTo(City::class);
    }
}
