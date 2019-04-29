<?php

$factory->define(App\Gittest3::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
