<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'image' => $faker->word,
        'position' => $faker->numberBetween(-10000, 10000),
        'is_active' => $faker->boolean,
    ];
});
