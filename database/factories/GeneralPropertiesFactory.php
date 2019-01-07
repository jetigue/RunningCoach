<?php

use Faker\Generator as Faker;
use App\Models\Properties\General\Season;

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
