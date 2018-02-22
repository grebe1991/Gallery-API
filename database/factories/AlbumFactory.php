<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0, 10) ,
        'album_name' =>$faker->name,
        'album_description' => $faker->paragraph,
        'cover_image' => $faker->url
    ];
});
