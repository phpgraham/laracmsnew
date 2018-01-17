<?php

namespace Database\Factories;

use Faker\Generator;

$factory->define(App\Pages::class, function (Generator $faker) {
    return [
        'menu_id' => '1',
        'title'   => $faker->sentence(),
        'content' => $faker->paragraph(),
        'created_by'  => '1',
    ];
});
