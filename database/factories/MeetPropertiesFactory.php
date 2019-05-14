<?php

use Faker\Generator as Faker;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Timing;

$factory->define(Host::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName.' '.'High School',
    ];
});

$factory->define(Timing::class, function (Faker $faker) {
    return [
        'name' => $faker
                    ->unique()
                    ->randomElement($array = ['Handheld', 'FAT']),
    ];
});

$factory->define(Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName.' '.'Park',
        'season_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

$factory->define(Name::class, function (Faker $faker) {
    return [
        'name' => $faker->name.' '.'Invitational',
        'season_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
