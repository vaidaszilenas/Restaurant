<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DishSeed::class);
        $this->call(AdminSeeder::class);
        $this->call(ReservationsSeeder::class);
    }
}
