<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert(
        [
            'name' => 'Bruno',
            'lastname' => 'Sessa',
            'email' => 'cariverplate77@gmail.com',
            'password' => bcrypt('sanclemente'),
        ]);
    }
}
