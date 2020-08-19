<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'create_by' => $faker->numberBetween(1, 20),
        'name' => $faker->jobTitle
    ];
});
