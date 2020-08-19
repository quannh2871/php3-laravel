<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 35),
        'content' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'create_by' => $faker->numberBetween(1, 20),
    ];
});
