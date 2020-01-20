<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'title' => 'Evento 1',
			'description' => 'Es un gran bar',
			'happy_hour' => 1,
			'enabled' => 1,
			'exclusive' => 1,
            'bar_id' => 1,
            'end_date' => '2020-12-09',
        ]);
    }
}
