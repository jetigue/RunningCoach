<?php

use Faker\Generator as Faker;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Level;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\RaceTitle;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = array('Boys', 'Girls', 'Mixed'))
    ];
});

$factory->define(Level::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = array('Varsity', 'Junior Varsity', 'Open'))
    ];
});

$factory->define(RaceTitle::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = array('Race of Champions', 'Crimson', 'Black'))
    ];
});

$factory->define(Division::class, function (Faker $faker) {
    return [
        'gender_id' => $faker->numberBetween($min=1, $max=3),
        'level_id' => $faker->numberBetween($min=1, $max=3),
    ];
});

$factory->define(Event::class, function (Faker $faker) {
    $name = $faker
        ->unique()
        ->randomElement($array = array(
            '1 Mile',
            '1600 Meters',
            '2 Mile',
            '3200 Meters',
            '5k'
        ));

    return [
        'name' => $name,
        'meters' => $faker->randomElement($array = array(
            1609, 1600, 3200, 3218, 5000
        )),
    ];
});
