<?php

use Illuminate\Database\Seeder;

class HappyglucsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('happyglucs')->insert([
            'frequency' => 10,
            'quantity' => 1,
            'exclusive' => 0,
            'bar_id' => 1,
            'enabled' => 1,
        ]);
    }
}
