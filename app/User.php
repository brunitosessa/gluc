<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Actions\hasHappyGluc;
use DB;
use Carbon\Carbon;

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
    	return $this->belongsToMany('App\Happygluc');
    }

    //Revisar
    public function canUseHappyGluc($bar_id)
    {
    	//Get if bar Has happygluc
    	$action = new hasHappyGluc;
    	if ( !$action->execute($bar_id) ) {
    		return 0;
    	}
    	else
    	{
    		$happyglucs = $this->happyglucs();

    		//Check if user has already use all their happyglucs from today
		    $ordersToday = $happyglucs->whereDate('happygluc_user.created_at', Carbon::now()->format('Y-m-d'));

		    //Bar in which the user has use happygluc today
		    $barOrder = $ordersToday->pluck('bar_id')->first();

			if ( $ordersToday->count() == 0 ) {
				return 1;
			}
			else
			{
			    //If user used happygluc today and the bar in which use it is different than the actual bar
			    if ( $bar_id != $barOrder)
			    {
			    	return 0;
			    }
			    else 
			    {
			    	$frequency = $happyglucs->
			    	$ordersFrequency = $happyglucs->where('bar_id', $bar_id)->whereBetween('happygluc_user.created_at', array(Carbon::now()->subDays(10), Carbon::now()))->get();

			    	if ( $ordersFrequency->count() < $this->happyglucs()->where('bar_id', $bar_id)->pluck('quantity')->first() )
			    	{
			    		return 1;
			    	}
			    	else
			    	{
			    		return 0;
			    	}
			    }
			}
	    }
    }
}
