<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VerificationApplication;
use Faker\Generator as Faker;

$factory->define(VerificationApplication::class, function (Faker $faker) {
    return [
        'documents' => '{}',
        'images' => '{}',
        'status' => $faker->regexify('[A-Za-z0-9]{2000}'),
        'comment' => $faker->text,
        'additional_properties' => '{}',
    ];
});
