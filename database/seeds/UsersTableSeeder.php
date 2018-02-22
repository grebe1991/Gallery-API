<?php

use App\User;
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
        User::truncate();

        $faker = \Faker\Factory::create();
        $password = Hash::make('im2bad4u');

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $faker->email,
                'password' => $password
            ]);
        }
    }
}
