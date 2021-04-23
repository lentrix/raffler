<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RaffleItem;
use Faker\Generator as Faker;

$factory->define(RaffleItem::class, function (Faker $faker) {
    return [
        'item' => $faker->word,
        'sponsor' => $faker->company,
        'value' => $faker->numberBetween(50,500)
    ];
});
