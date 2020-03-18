<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('event_types')->insert([
            'type' => 'Electrónica',
        ]);
    }
}
