<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'cate_id' => $faker->numberBetween(1, 10),
        'create_by' => $faker->numberBetween(1, 20)
    ];
});
