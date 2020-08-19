<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'password' => Hash::make('123456'),
        'role' => $faker->numberBetween(1, 2),
        'avatar' => $faker->imageUrl($width = 200, $height = 200)
    ];
});
