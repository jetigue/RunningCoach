<?php

use Faker\Generator as Faker;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Division;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = ['Boys', 'Girls', 'Mixed']),
    ];
});

$factory->define(Division::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = ['Varsity', 'Junior Varsity', 'Open']),
    ];
});

$factory->define(Event::class, function (Faker $faker) {
    $name = $faker
        ->unique()
        ->randomElement($array = [
            '1 Mile',
            '1600 Meters',
            '2 Mile',
            '3200 Meters',
        ]);

    return [
        'name' => $name,
        'meters' => $faker->randomElement($array = [
            1609, 1600, 3200, 3218,
        ]),
    ];
});
