<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Reservation;
use App\User;

class ReservationsSeeder extends Seeder
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
    $users = User::all();

    foreach($users as $user) {

      $reservations = new Reservation;
      $reservations->name = $faker->name;
      $reservations->phone = $faker->randomNumber;



      //$reservations->users_id = $reservations->users->id; // turi daug ju



      $reservations->users_id = $user->id;
      $reservations->date = $faker->dateTime();
      $reservations->people_amount = $faker->numberBetween(1,6);
      $reservations->created_at = $faker->dateTime();
      $reservations->user = $faker->name;
      $reservations->save();
      // sudo dpkg -i virtualboxo failas

    }
  }
}
