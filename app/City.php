<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function publicities()
    {
    	return $this->hasMany('App\Publicity');
    }
}
