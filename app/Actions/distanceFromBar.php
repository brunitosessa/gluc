<?php
namespace App\Actions;

use App\Bar;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class distanceFromBar
{
	public function execute($bar_id, $lat, $lng)
	{
		$bar = Bar::findOrFail($bar_id);
		$user = User::findOrFail(1);

		$query = 'select ( 111.045 * acos( cos( radians(' . $lat . ') ) 
		* cos( radians( '.$bar->lat.' ) )
		* cos( radians( '.$bar->lng.' )
		- radians(' . $lng  . ') )
		+ sin( radians(' . $lat  . ') )
		* sin( radians( '. $bar->lat .' ) ) ) ) as distance';

		$distance = DB::select($query);

       return $distance[0]->distance;
   }
}