<?php

use App\Models\Properties\Meets\CrossCountry\Venue;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\CrossCountry\Name;
use App\Models\Properties\Meets\Timing;
use Faker\Generator as Faker;

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
    ];
});

$factory->define(Name::class, function (Faker $faker) {
    return [
        'name' => $faker->name.' '.'Invitational'
    ];
});

$factory->define(\App\Models\Properties\Meets\Track\Name::class, function (Faker $faker) {
    return [
        'name' => $faker->name.' '.'Invitational'
    ];
});

$factory->define(\App\Models\Properties\Meets\Track\Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->name.' '.'Stadium',
        'track_surface_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});
