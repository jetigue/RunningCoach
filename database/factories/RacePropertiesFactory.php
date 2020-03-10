<?php

use App\Models\Properties\Races\CrossCountry\Event;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use App\Models\Properties\Races\Title;
use Faker\Generator as Faker;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = ['Boys', 'Girls']),
    ];
});

$factory->define(Level::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = ['Varsity', 'Junior Varsity', 'Open', 'JV']),
    ];
});

$factory->define(Title::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = ['Race of Champions', 'Crimson', 'Black']),
    ];
});

$factory->define(Division::class, function (Faker $faker) {
    return [
        'gender_id' => $faker->numberBetween($min = 1, $max = 2),
        'level_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});

$factory->define(Event::class, function (Faker $faker) {
    $name = $faker
        ->unique()
        ->randomElement($array = [
            '3 miles',
            '5k',
        ]);

    return [
        'name' => $name,
        'meters' => $faker->randomElement($array = [
            4800, 5000,
        ]),
    ];
});

$factory->define(\App\Models\Properties\Races\Track\Event::class, function (Faker $faker) {
    $name = $faker
        ->unique()
        ->randomElement($array = [
            '1600',
            '1500',
        ]);

    return [
        'name' => $name,
        'meters' => $faker->randomElement($array = [
            1600, 1500,
        ]),
        'relay' => 0,
    ];
});
