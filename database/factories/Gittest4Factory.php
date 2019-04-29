<?php

$factory->define(App\Gittest4::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
