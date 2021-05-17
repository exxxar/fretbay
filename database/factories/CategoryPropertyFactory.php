<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoryProperty;
use Faker\Generator as Faker;

$factory->define(CategoryProperty::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'type' => $faker->regexify('[A-Za-z0-9]{500}'),
    ];
});
