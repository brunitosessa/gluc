<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Bar extends Authenticatable
{
	protected $fillable = [
		'name', 'image', 'logo', 'city_id', 'address', 'description', 'phone', 'email', 'lat', 'lng', 'enabled',
 	];
   
   protected $hidden = [
         'password', 'remember_token',
 	];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}