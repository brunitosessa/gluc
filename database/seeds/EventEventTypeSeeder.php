<?php

use Illuminate\Database\Seeder;

class EventEventTypeTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('event_event_type')->insert([
    		[
	            'event_id' => 1,
	            'event_type_id' => 1,
	        ],
	        [
	        	'event_id' => 1,
	        	'event_type_id' => 2,
	        ]
        ]);
    }
}
