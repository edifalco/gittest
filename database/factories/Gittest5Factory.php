<?php

$factory->define(App\Gittest5::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
