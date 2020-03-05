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

    public function happyhours()
    {
        return $this->hasMany('App\Happyhour');
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

        //If has businessHours today 
        if ( $today_businesshours->count() )
        {
            $start_time = new Carbon($today_businesshours->first()->start_time);
            $end_time = new Carbon($today_businesshours->first()->end_time);

            //Diferences between NOW and start_time and end_time
            $diff_start = $start_time->diffInMinutes(Carbon::now(),false);
            $diff_end = $end_time->diffInMinutes(Carbon::now(),false);
            $diff_between = $start_time->diffInMinutes($end_time, false);

            //Bar closes same day as open
            if ($diff_between > 0)
            {
                //If NOW is between start_time and end_time
                if ($diff_start > 0 && $diff_end < 0)
                {
                    return [
                        'open' => 1,
                        'message' => 'Abierto hasta '.$end_time->format('H:i'),
                    ];
                }
                else
                {
                    return [
                        'open' => 0,
                        'message' => 'Cerro '.$end_time->format('H:i'),
                    ];
                }

            }
            //Bar closes next day (After 00:00)
            else
            {
                //Don't compare with end_time because it's imposible
                if ($diff_start > 0)
                {
                    return [
                        'open' => 1,
                        'message' => 'Abierto hasta '.$end_time->format('H:i'),
                    ];
                }
                else if ($diff_start < 0 && $diff_end < 0)
                {
                    return [
                        'open' => 1,
                        'message' => 'Abierto hasta '.$end_time->format('H:i'),   
                    ];
                }
                else if ( $diff_end > 0)
                {
                    return [
                        'open' => 0,
                        'message' => 'Cerro '.$end_time->format('H:i'),   
                    ];
                }
            }
        }
        return 0;
    }
    //End Accessors
}