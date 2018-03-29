<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Dish;

class DishSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected  function upload($url){
       $photoUrl = explode('/', $url);
       $url = $photoUrl[2].'/'.$photoUrl[3].'/'.$photoUrl[4];
       return $url;
     }


    public function run()
    {

        $faker = Faker::create();

        $faker->name();

      foreach(range(1,6) as $x) {
        $url = $faker->image($dir = 'storage/app/public/photos', $width = 640, $height = 480, 'food');

        $dish = new Dish;
        $dish->title = $faker->name;
        $dish->price = $faker->numberBetween(5,50);
        $dish->description = $faker->text(50);
        $dish->file_name = $this->upload($url);
        $dish->save();
 // sudo dpkg -i virtualboxo failas
      }
    }
}
