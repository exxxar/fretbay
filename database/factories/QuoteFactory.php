<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat(0, 0, 9999999999.),
        'valid_until_date' => $faker->dateTime(),
        'additional_info' => $faker->text,
        'status' => $faker->regexify('[A-Za-z0-9]{2000}'),
    ];
});
