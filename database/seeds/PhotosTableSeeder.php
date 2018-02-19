<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 1000; $i++) {
            Photo::create([
                'album_id' => $faker->numberBetween(0, 10),
                'path' => $faker->url,
            ]);
        }
    }
}
