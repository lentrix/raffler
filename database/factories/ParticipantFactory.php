<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'other_info' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});
