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

$factory->define(App\Models\Auth\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'group_id' => -1,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});
