<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->name('female'),
        'location' => $faker->locale.' '.$faker->sentence,
        'owner_id' => User::first()->id
    ];
});
