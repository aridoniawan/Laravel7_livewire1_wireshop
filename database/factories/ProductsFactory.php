<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description'=> $faker->text(100),
        'price' => $faker->numberBetween(10000, 100000),
        'image' => ''
    ];
});
