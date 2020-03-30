<?php

use Illuminate\Database\Seeder;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beers')->insert([
            [
                'name' => 'Bancate la peluza',
                'style' => 'Sour',
                'description' => 'APA muy buena!',
                'brand' => 'Astor',
                'color' => 'Red',
                'ibu' => 20,
                'alcohol' => 5,
                'price' => 170,
                'happyhour_price' => 100,
                'bar_id' => 1,
                'enabled' => 1,
            ],
            [
                'name' => 'Mapachamama',
                'style' => 'IPA SOUR',
                'description' => 'Ipa excelente',
                'brand' => 'Strange Brewing',
                'color' => 'Blond',
                'ibu' => 55,
                'alcohol' => 10,
                'price' => 190,
                'happyhour_price' => 100,
                'bar_id' => 1,
                'enabled' => 1,
            ]
        ]);
    }
}
