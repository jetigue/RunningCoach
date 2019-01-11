<?php

use Faker\Generator as Faker;
use App\Models\Properties\General\Season;
use App\Models\Properties\General\Distance;

$factory->define(Season::class, function (Faker $faker) {
    return [
        'name' => $faker
            ->unique()
            ->randomElement($array = array (
                'Cross Country',
                'Outdoor Track',
                'Indoor Track'
            )),
    ];
});

$factory->define(Distance::class, function (Faker $faker) {
    return [
        'name' => '2 Mile',
        'meters' => 3218
    ];
});
