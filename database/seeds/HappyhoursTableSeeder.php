<?php

use Illuminate\Database\Seeder;

class HappyhoursTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('happyhours')->insert([
            'date' => 2,
            'start_time' => '20:00',
            'end_time' => '22:00',
            'bar_id' => 1,
            'enabled' => 1,
        ]);
    }
}
