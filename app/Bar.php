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

    public function beers()
    {
        return $this->hasMany('App\Beer');
    }

    //Accessors
    public function getIsOpenedAttribute()
    {
        $today = Carbon::now()->format('w');
        $todayBusinessHours = $this->businessHours()->where('date', '=', $today)->where('enabled',1)->get();

        //If Bar have businessHours today 
        if ($todayBusinessHours->count())
        {
            $startTime = new Carbon($todayBusinessHours->first()->start_time);
            $endTime = new Carbon($todayBusinessHours->first()->end_time);

            //Diferences between NOW and startTime and endTime
            $diffStart = $startTime->diffInMinutes(Carbon::now(),false);
            $diffEnd = $endTime->diffInMinutes(Carbon::now(),false);
            $diffBetween = $startTime->diffInMinutes($endTime, false);

            //If NOW is between startTime and endTime
            if ($diffStart > 0 && $diffEnd < 0)
            {
                return [
                    'open' => 1,
                    'message' => 'Abierto hasta '.$endTime->format('H:i'),
                ];
            }
            //If Bar is closed, opens Next businessHour
            else if ($diffEnd > 0)
            {
                return [
                    'open' => 0,
                    'message' => 'Cerro '.$endTime->format('H:i'),
                ];
            }
            //If Bar doesn't open yet, check if is open past 00:00 yesterday
            else if ($diffStart < 0)
            {
                $yesterdayBusinessHours = $this->businessHours()->where('date', '=', $today-1)->where('enabled',1)->get();

                //If Bar opened yesterday
                if ($yesterdayBusinessHours->count() > 0)
                {
                    //Bring businesshours from yesterday
                    $yesterdayStartTime = new Carbon($yesterdayBusinessHours->first()->start_time);
                    $yesterdayEndTime = new Carbon($yesterdayBusinessHours->first()->end_time);

                    $yesterday_diffBetween = $yesterdayStartTime->diffInMinutes($yesterdayEndTime, false);

                    //Check if yesterday's endTime is next day of yesterday's startTime
                    if ($yesterday_diffBetween < 0)
                    {
                        //If Now is lower than yesterday's endTime, Now is opened
                        if ($yesterdayEndTime->diffInMinutes(Carbon::now(),false) < 0 )
                        {
                            return [
                                'open' => 1,
                                'message' => 'Abierto hasta '.$yesterdayEndTime->format('H:i'),
                            ];
                        }
                        //If Now is greater than yesterday's endTime, Now is closed
                        else
                        {
                            return [
                                'open' => 0,
                                'message' => 'Abre '.$startTime->format('H:i'),
                            ];
                        }
                    }
                }
                //If Bar didn't open yesterday, Now is closed
                else
                {
                    return [
                        'open' => 0,
                        'message' => 'Abre '.$startTime->format('H:i'),
                    ];
                }
            }
        }
        //If Bar doesn't have businessHours today -> check if is opened passed 00:00 yesterday
        else
        {
            $yesterdayBusinessHours = $this->businessHours()->where('date', '=', $today-1)->where('enabled',1)->get();

            //If Bar opened yesterday
            if ($yesterdayBusinessHours->count() > 0)
            {
                //Bring businesshours from yesterday
                $yesterdayStartTime = new Carbon($yesterdayBusinessHours->first()->start_time);
                $yesterdayEndTime = new Carbon($yesterdayBusinessHours->first()->end_time);

                //Check if yesterday's endTime is next day of yesterday's startTime
                $yesterday_diffBetween = $yesterdayStartTime->diffInMinutes($yesterdayEndTime, false);

                if ($yesterday_diffBetween < 0)
                {
                    //If Now is lower than yesterday's endTime, Now is opened
                    if ($yesterdayEndTime->diffInMinutes(Carbon::now(),false) < 0 )
                    {
                        return [
                            'open' => 1,
                            'message' => 'Abierto hasta '.$yesterdayEndTime->format('H:i'),
                        ];
                    }
                    //If Now is greater than yesterday's endTime, Now is closed
                    else
                    {
                        return [
                            'open' => 0,
                            'message' => 'Cerrado',
                        ];
                    }
                }
            }
            //If Bar didn't open yesterday, Now is closed
            else
            {
                return [
                    'open' => 0,
                    'message' => 'Cerrado',
                ];
            }
        }
    }
    //End Accessors
}