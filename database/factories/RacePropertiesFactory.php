<?php

use Faker\Generator as Faker;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Races\Gender;

$factory->define(Gender::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = array('Boys', 'Girls', 'Mixed'))
    ];
});

$factory->define(Division::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = array('Varsity', 'Junior Varsity', 'Open'))
    ];
});

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => '2 Mile',
        'meters' => 3218
    ];
});