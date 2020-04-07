<?php
namespace App\Actions;

use App\Bar;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class canUseHappyGluc
{
	public function execute($bar_id)
	{
		$bar = Bar::findOrFail($bar_id);
		$user = User::findOrFail(1);

		//Check if bar has Happygluc
		if ($bar->happygluc()->count() == 0)
			return 0;
		else
		{
			//Get data of Happygluc's Bar
			$frequency = $bar->happygluc->frequency;
			$quantity = $bar->happygluc->quantity;

			//Used user Happygluc
			$happyglucs = $user->happyglucs()->get();

			//User's happy glucs used today
		    $ordersToday = $user->happyglucs()->whereDate('happygluc_user.created_at', Carbon::now()->format('Y-m-d'));

			//Quantity of Happyglucs used by the user in that frequency
			$ordersFrequency = $user->happyglucs()->where('bar_id', $bar_id)->whereBetween('happygluc_user.created_at', array(Carbon::now()->subDays($frequency), Carbon::now()))->count();
			
		    //Bar in which the user has use happygluc today
		    $barOrder = $ordersToday->pluck('bar_id')->first();

			if ( $ordersToday->count() == 0 ) 
			{
				if ( $ordersFrequency < $quantity )
				{					
					return [
                    	'status' => 1,
                    	'message' => 'Puede pedir',
                    ];
                }
				else
				{
					return [
                    	'status' => 0,
                    	'message' => 'Ya usaste todos los HappyGlucs en este bar',
                    ];
				}
			}
			else
			{
			    //If user used happygluc today and the bar in which was used it is different than the actual bar
			    if ( $bar_id != $barOrder)
			    {
			    	return [
                    	'status' => 0,
                    	'message' => 'Ya usaste tus HappyGlucs en otro bar',
                    ];
			    }
			    else 
			    {
			    	if ( $ordersFrequency < $quantity )
			    	{
			    		return [
	                    	'status' => 1,
	                    	'message' => 'Puede pedir',
	                    ];
                	}
			    	else
			    		return [
	                    	'status' => o,
	                    	'message' => 'Ya usaste todos los HappyGlucs en este bar',
	                    ];
			    }
			}
	    }
	}
}