<?php

$factory->define(App\Gittest2::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
