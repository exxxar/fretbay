<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Object;
use Faker\Generator as Faker;

$factory->define(Object::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'volume' => $faker->randomFloat(0, 0, 9999999999.),
        'image' => $faker->word,
        'position' => $faker->numberBetween(-10000, 10000),
        'is_active' => $faker->boolean,
    ];
});
