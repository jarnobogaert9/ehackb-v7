<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Talk;
use Faker\Generator as Faker;

$factory->define(Talk::class, function (Faker $faker) {
    return [
        'title' => $faker->userName,
        'speaker' => $faker->name,
        'photo' => 'sessie1.png',
        'excerpt' => $faker->text,
        'body' => $faker->paragraph,
        'start_time' => $faker->time,
        'end_time' => $faker->time,
        'max_places' => $faker->numberBetween(50, 60),
        'available_places' => $faker->numberBetween(30, 50),
    ];
});
