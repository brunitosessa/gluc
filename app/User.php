<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $fillable = [
		'name', 'lastname', 'avatar', 'phone', 'email', 'facebook_id', 'city_id', 'api_token'
 	];
   
   protected $hidden = [
         'password',
 	];

    public function happyglucs()
    {
    	return $this->belongsToMany('App\Happygluc')->withTimestamps();
    }

    public function favorites()
    {
    	return $this->belongsToMany('App\Bar', 'favorites')->withTimestamps();
    }
}
