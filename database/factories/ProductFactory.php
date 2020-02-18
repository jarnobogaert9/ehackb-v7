<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'photo' => 'product.png',
        'price' => $faker->numberBetween(0, 10),
        'quantity' => $faker->numberBetween(100, 200),
        'sold' => $faker->numberBetween(0, 50)
    ];
});
