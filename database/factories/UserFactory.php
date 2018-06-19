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
        'group_id' => [-1,1,2][mt_rand(0,2)],
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'active' => (bool)mt_rand(0,1),
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});
