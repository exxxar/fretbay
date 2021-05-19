<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'min_price' => $faker->randomFloat(0, 0, 9999999999.),
        'image' => $faker->word,
        'position' => $faker->numberBetween(-10000, 10000),
        'is_active' => $faker->boolean,
    ];
});
