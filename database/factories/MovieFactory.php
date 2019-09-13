<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function(Faker $faker) {
    return [
        'name'        => $faker->text,
        'cast'        => $faker->text,
        'genere'      => $faker->text,
        'description' => $faker->paragraph,
        'image'       => $faker->text,
    ];
});
