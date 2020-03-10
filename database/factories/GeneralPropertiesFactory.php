<?php

use App\Models\Properties\General\DayTime;
use App\Models\Properties\General\Distance;
use App\Models\Properties\General\Season;
use App\Models\Properties\General\TerrainType;
use App\Models\Properties\General\TrackSurface;
use Faker\Generator as Faker;

$factory->define(Season::class, function (Faker $faker) {
    $name = $faker
        ->unique()
        ->randomElement($array = [
            'Cross Country',
            'Outdoor Track',
            'Indoor Track',
        ]);

    return [
        'name' => $name,
    ];
});

$factory->state(Season::class, 'outdoor', [
    'name' => 'Outdoor Track',
]);

$factory->state(Season::class, 'indoor', [
    'name' => 'Indoor Track',
]);

$factory->define(Distance::class, function (Faker $faker) {
    return [
        'name' => '2 Mile',
        'meters' => 3218,
    ];
});

$factory->define(TerrainType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});

$factory->define(DayTime::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});

$factory->define(TrackSurface::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
