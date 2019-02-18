<?php

use Faker\Generator as Faker;

$factory->define(App\FavoriteMovie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'score' => $faker->numberBetween(0,10),
    ];
});
