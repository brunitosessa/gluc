<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class Bar extends Authenticatable
{
    use Notifiable;
    
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

    //Accessors
    public function getIsOpenedAttribute()
    {
        $open = 0;
        $today = Carbon::now()->format('w');
        $today_businesshours = $this->businessHours()->where('date', '=', $today)->get();

        //If has businessHours today do something
        if ( $today_businesshours->count() )
        {
            if ( (new Carbon($today_businesshours->first()->start_time))->format("H:i") < Carbon::now()->format('H:i') )
                return 1;
        }
        return 0;
    }

}