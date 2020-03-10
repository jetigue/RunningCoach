<?php

use App\Models\Athlete;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Track\Venue;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Track\Event;
use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\Result;
use App\Models\TimeTrials\Track\TimeTrial;
use Faker\Generator as Faker;

$factory->define(TimeTrial::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'trial_date' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'track_venue_id' => Venue::all()->random()->id,
        'timing_method_id' => Timing::all()->random()->id,
    ];
});

$factory->define(Race::class, function (Faker $faker) {
    return [
        'track_time_trial_id' => TimeTrial::all()->random()->id,
        'gender_id' => Gender::all()->random()->id,
        'track_event_id' => Event::all()->random()->id,
        'notes' => $faker->sentence,
    ];
});

$factory->define(Result::class, function (Faker $faker) {
    return [
        'track_time_trial_race_id' => Race::all()->random()->id,
        'athlete_id' => Athlete::all()->random()->id,
        'heat' => $faker->numberBetween(1, 4),
        'total_seconds' => $faker->numberBetween(240, 480),
        'milliseconds' => $faker->numberBetween(0, 99),
        'place' => $faker->numberBetween(1, 20),
    ];
});
