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
			'email' => 'cariverplate778@gmail.com',
			'city_id' => 1,
            'device_token' => 'fypBDKG7ENg:APA91bGlvdn57T1-ceKaVPwx3RcoSZtQ3Swz1L529IfjBvV4NXWpNuJz81v7xxnbaB_CiEkj8Tevxydl53hycxuLBKJX6Uiw_ZNqTp5SCNiil142UzMX7QUVu1ZtstLyRJJeUzNRYH6V',
			'api_token' => Str::random(60),
            'facebook_id' => '123456',
        ]);
    }
}
