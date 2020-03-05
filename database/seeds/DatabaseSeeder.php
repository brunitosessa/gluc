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
        $this->call(HappyglucsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(HappyhoursTableSeeder::class);
        $this->call(BusinessHoursTableSeeder::class);
    }
}
