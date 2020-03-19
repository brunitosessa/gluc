<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('events')->insert([
            'title' => 'Evento 1',
            'address' => 'Calle 11 1553 entre 21 y 22',
            'lat' => 0,
            'lng' => 14,
            'description' => 'Es un gran bar',
            'city_id' => 1,
            'bar_id' => 1,
            'enabled' => 1,
            'date' => '2020-03-30',
        ]);
    }
}
