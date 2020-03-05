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
        [
            'title' => 'La mejor Promo',
			'description' => 'Es un gran bar',
			'enabled' => 1,
			'exclusive' => 1,
            'bar_id' => 1,
            'end_date' => '2020-12-09',
        ],
        [
            'title' => 'La mejor Promo numero 2',
            'description' => 'Es un gran bar',
            'enabled' => 1,
            'exclusive' => 1,
            'bar_id' => 2,
            'end_date' => '2020-12-09',
        ]
        ]);
    }
}
