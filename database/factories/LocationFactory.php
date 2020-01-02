<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'division_name' => $faker->country,
        'district_name' => $faker->state,
        'upzila_name'=> $faker->city,
    ];
});
