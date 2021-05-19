<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'articles' => '{}',
        'place_of_loading' => '{}',
        'place_of_delivery' => '{}',
        'shipping_date_from' => $faker->dateTime(),
        'shipping_date_to' => $faker->dateTime(),
        'unshipping_date_from' => $faker->dateTime(),
        'unshipping_date_to' => $faker->dateTime(),
        'messages' => '{}',
        'additional_info' => $faker->text,
        'images' => '{}',
        'status' => $faker->word,
    ];
});
