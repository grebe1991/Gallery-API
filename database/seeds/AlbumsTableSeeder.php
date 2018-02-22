<?php

use App\Album;
use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Album::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Album::create([
                'album_name' => $faker->name,
                'album_description' => $faker->paragraph,
                'cover_image' => $faker->url,
                'user_id' => $faker->numberBetween(0, 10)
            ]);
        }
    }
}
