<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostImage;
use Faker\Generator as Faker;

$factory->define(PostImage::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 35),
        'url' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
    ];
});
