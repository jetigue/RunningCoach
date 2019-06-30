<?php

use App\Models\Runninglog\RunEffort;
use App\Models\Runninglog\RunFeeling;
use App\Models\RunningLog\RunType;

use Faker\Generator as Faker;

$factory->define(RunType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph
    ];
});

$factory->define(RunEffort::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph
    ];
});

$factory->define(RunFeeling::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph
    ];
});


