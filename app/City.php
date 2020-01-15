<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public function bars()
    {
    	return $this->hasMany('App\Bar');
    }

    public function events()
    {
    	return $this->hasMany('App\Event');
    }

    public function publicities()
    {
    	return $this->hasMany('App\Publicity');
    }
}
