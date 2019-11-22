<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'thumbnail' => 'test.jpg',
        'start_time' => $faker->time(),
        'location' => $faker->streetName
    ];
});
