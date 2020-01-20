<?php

use Illuminate\Database\Seeder;

class PublicitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publicities')->insert([
            'title' => 'Evento 1',
			'description' => 'Es un gran bar',
			'city_id' => 1,
            'end_date' => '2020-12-09',
            'enabled' => 1,
        ]);
    }
}
