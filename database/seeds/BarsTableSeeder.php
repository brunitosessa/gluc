<?php

use Illuminate\Database\Seeder;

class BarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		DB::table('bars')->insert([
            'name' => 'Ogham',
            'address' => 'Calle 11 1553 entre 21 y 22',
            'description' => 'Es un gran bar',
            'phone' => '22177777162',
            'email' => Str::random(10).'@gmail.com',
            'lat' => 0,
            'lng' => 14,
            'enabled' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
