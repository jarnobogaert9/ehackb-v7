<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'game_id' => factory(App\Game::class),
        'name' => $faker->domainName,
    ];
});
