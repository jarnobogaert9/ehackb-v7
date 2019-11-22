<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teamrequest;
use Faker\Generator as Faker;

$factory->define(Teamrequest::class, function (Faker $faker) {
    return [
        'team_id' => factory(App\Team::class),
        'user_id' => factory(App\User::class),
        'accepted' => 0,
        'rejected' => 0
    ];
});
