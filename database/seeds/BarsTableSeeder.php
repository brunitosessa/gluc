<?php

use Illuminate\Database\Seeder;

class BarsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bars')->insert([
        [
            'name' => 'Ogham',
            'city_id' => 1,
            'address' => 'Calle 11 1553 entre 21 y 22',
            'description' => 'Es un gran bar',
            'phone' => '22177777162',
            'email' => 'ogham@gluc.com.ar',
            'lat' => 0,
            'lng' => 14,
            'enabled' => 1,
            'password' => bcrypt('password'),
        ],
        [
            'name' => 'Wild Hops',
            'city_id' => 1,
            'address' => 'Calle 11 1553 entre 21 y 22',
            'description' => 'Es un gran bar',
            'phone' => '22177777162',
            'email' => 'wildhops@gluc.com.ar',
            'lat' => 0,
            'lng' => 14,
            'enabled' => 1,
            'password' => bcrypt('password'),
        ]
        ]);
    }
}
