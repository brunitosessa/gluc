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

    public function promotions()
    {
    	return $this->hasMany('App\Promotion');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function happygluc()
    {
        return $this->hasOne('App\Happygluc');
    }

    public function businessHours()
    {
        return $this->hasMany('App\BusinessHour');
    }

}