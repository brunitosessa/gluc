<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
