<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bruno',
			'lastname' => 'Sessa',
			'phone' => '2214980399',
			'email' => 'cariverplate77@gmail.com',
			'phone_id' => 'aaabbbccc000111222',
			'city_id' => 1,
			'api_token' => Str::random(60),
        ]);
    }
}
