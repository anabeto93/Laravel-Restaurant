<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraphs(2, true),
        'price' => rand(100, 999) / 2.5
    ];
});
