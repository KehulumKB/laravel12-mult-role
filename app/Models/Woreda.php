<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Woreda extends Model
{
    protected $guarded = [];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function kebeles(){
        return $this->hasMany(Kebele::class);
    }

    public function zone(){
        return $this->belongsTo(Zone::class);
    }
}
