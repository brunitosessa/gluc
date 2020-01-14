<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicity extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
