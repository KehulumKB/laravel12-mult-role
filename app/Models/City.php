<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function sub_cities(){
        return $this->hasMany(SubCity::class);
    }

    public function woreda(){
        return $this->belongsTo(Woreda::class);
    }
}
