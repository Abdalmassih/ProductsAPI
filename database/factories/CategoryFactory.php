<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'number' => $faker->unique()->numberBetween(1, 900),

    ];
});
