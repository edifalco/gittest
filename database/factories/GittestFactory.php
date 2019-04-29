<?php

$factory->define(App\Gittest::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
