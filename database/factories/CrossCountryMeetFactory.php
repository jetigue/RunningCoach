<?php

use App\Models\Athlete;
use App\Models\Meets\CrossCountryMeet;
use App\Models\Properties\Meets\CrossCountry\Venue;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Races\CrossCountry\Event;
use App\Models\Properties\Races\Division;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Faker\Generator as Faker;

$factory->define(CrossCountryMeet::class, function (Faker $faker) {
    $y = $faker->numberBetween($min = 2009, $max = 2019);
    $m = $faker->numberBetween($min = 10, $max = 11);
    $d = $faker->numberBetween($min = 10, $max = 30);

    return [
        'meet_name_id' => Name::all()->random()->id,
        'meet_date' => $y.'-'.$m.'-'.$d,
        'cross_country_venue_id' => Venue::all()->random()->id,
        'host_id' => Host::all()->random()->id,
        'timing_method_id' => Timing::all()->random()->id,

    ];
});

$factory->define(TeamResult::class, function (Faker $faker) {
    return [
            'cross_country_meet_id' => CrossCountryMeet::all()->random()->id,
            'division_id' => Division::all()->random()->id,
            'cross_country_event_id' => Event::all()->random()->id,
            'place' => $faker->numberBetween($min = 1, $max = 10),
            'points' => $faker->numberBetween($min = 50, $max = 300),
            'number_teams' => $faker->numberBetween($min = 11, $max = 25),
            'number_runners' => $faker->numberBetween($min = 100, $max = 300),
        ];
});

$factory->define(Result::class, function (Faker $faker) {
    $place = $faker->numberBetween($min = 1, $max = 100);

    return [
            'cross_country_team_result_id' => TeamResult::all()->random()->id,
            'athlete_id' => Athlete::all()->random()->id,
            'place' => $place,
            'total_seconds' => $faker->numberBetween($min = 960, $max = 1440),
            'milliseconds' => $faker->numberBetween($min = 0, $max = 99),
            'points' => $place,
        ];
});
