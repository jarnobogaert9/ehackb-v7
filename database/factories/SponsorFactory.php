<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
        'tier' => $faker->numberBetween(1, 3),
        'logo' => 'accenture.png',
        'url' => $faker->url
    ];
});
