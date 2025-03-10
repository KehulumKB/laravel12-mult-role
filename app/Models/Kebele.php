<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebele extends Model
{
    protected $guarded = [];
    
    public function sub_city()
    {
        return $this->belongsTo(SubCity::class);
    }

     public function woreda()
    {
        return $this->belongsTo(Woreda::class);
    }
}
