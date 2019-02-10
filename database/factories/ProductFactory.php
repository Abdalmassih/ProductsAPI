<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->firstname,
        'sku' => $faker->bankAccountNumber,
        'active' => $faker->boolean($chanceOfGettingTrue = 40),
        'current_price' => $faker->numberBetween(1, 900),
        'old_price' => $faker->numberBetween(1, 900),
        'quantity' => $faker->numberBetween(1, 900),
        'unlimited_quantity' => $faker->boolean($chanceOfGettingTrue = 40),
        'tax_type' => $faker->numberBetween(1, 3),
        'brief' => $faker->paragraph,
        'description' => $faker->paragraph,
        'url' => $faker->url,
        'meta_title' => $faker->word,
        'meta_description' => $faker->paragraph,
        'meta_keywords' => $faker->monthName,
    ];
});
