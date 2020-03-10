<?php

use App\Models\Properties\General\DayTime;
use App\Models\Properties\General\TerrainType;
use App\Models\Runninglog\RunEffort;
use App\Models\Runninglog\RunFeeling;
use App\Models\RunningLog\RunType;
use App\Models\Users\User;
use Faker\Generator as Faker;

$factory->define(RunType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
    ];
});

$factory->define(RunEffort::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
    ];
});

$factory->define(RunFeeling::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Models\RunningLog\RunningLog::class, function (Faker $faker) {
    return [
        'user_id'           => User::all()->random()->id,
        'run_date'         => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'day_time_id'      => DayTime::all()->random()->id,
        'distance'         => $faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 10),
        'total_seconds'    => $faker->numberBetween($min = 1800, $max = 3600),
        'run_type_id'      => RunType::all()->random()->id,
        'terrain_type_id'  => TerrainType::all()->random()->id,
        'run_effort_id'    => RunEffort::all()->random()->id,
        'run_feeling_id'   => RunFeeling::all()->random()->id,
        'notes'            => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
