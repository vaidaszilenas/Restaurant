<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $faker = Faker::create();
          $faker->name();

        foreach(range(1,60) as $x) {

          $users = new User;
          $users->is_admin = 1;
          $users->name = $faker->name;
          $users->surname = $faker->name;
          $users->date_of_birth = $faker->dateTime($max = '-18 years');
          $users->phone_number = $faker->randomNumber;
          $users->email = $faker->email;
          $users->password = bcrypt('admin');
          $users->address = $faker->address();
          $users->city = $faker->city;
          $users->zip_code = $faker->randomNumber;
          $users->country = $faker->country;
          $users->save();
   // sudo dpkg -i virtualboxo failas

    }
  }
}
