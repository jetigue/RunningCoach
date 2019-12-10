<?php

use App\Models\Meets\CrossCountryMeet;
use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Venue;
use App\Models\Results\CrossCountry\TeamResult;
use Faker\Generator as Faker;

$factory->define(CrossCountryMeet::class, function (Faker $faker) {
    $y = $faker->numberBetween($min = 2009, $max = 2019);
    $m = $faker->numberBetween($min = 10, $max = 11);
    $d = $faker->numberBetween($min = 10, $max = 30);
    return [
        'meet_name_id' => Name::all()->random()->id,
        'meet_date' => $y . '-' . $m . '-' . $d,
        'venue_id' => Venue::all()->random()->id,
        'host_id' => Host::all()->random()->id,
        'timing_method_id' => Timing::all()->random()->id

    ];

});

$factory->define(TeamResult::class, function (Faker $faker) {
        return [

        ];
    })

