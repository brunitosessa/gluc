<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(BarsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(PublicitiesTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);

    }
}
