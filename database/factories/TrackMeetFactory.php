<?php

use Faker\Generator as Faker;
use App\Models\Properties\Races\Event;
use App\Models\Meets\TrackMeet;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Timing;
use App\Models\Results\Track\TeamResult;
use App\Models\Properties\Races\Division;
use App\Models\Results\Track\Result;
use App\Models\Athlete;

$factory->define(TrackMeet::class, function (Faker $faker) {
    $season = Season::where('name', 'Outdoor Track')->firstOrFail();
    return [
        'meet_name_id' => Name::all()->random()->id,
        'meet_date' => $faker->date($format = 'Y-m-d'),
        'season_id' => $season->id,
        'host_id' => Host::all()->random()->id,
        'venue_id' => Venue::all()->random()->id,
        'timing_method_id' => Timing::all()->random()->id
    ];
});

$factory->define(TeamResult::class, function (Faker $faker) {
    $division = Division::all()->random();

    return [
        'track_meet_id' => Name::all()->random()->id,
        'division_id' => $division->id,
        'place' => $faker->numberBetween($min = 1, $max = 5),
        'number_teams' => $faker->numberBetween($min = 5, $max = 20),
        'points' => $faker->numberBetween($min = 50, $max = 200),
    ];
});

$factory->define(Result::class, function (Faker $faker) {
    return [
        'track_team_result_id' => TeamResult::all()->random()->id,
        'athlete_id' => Athlete::all()->random()->id,
        'event_id' => Event::all()->random()->id,
        'place' => $faker->numberBetween($min = 1, $max = 20),
        'minutes' => $faker->numberBetween($min = 8, $max = 16),
        'seconds' => $faker->numberBetween($min = 0, $max = 59),
//        'total_seconds' => $faker->numberBetween($min = 600, $max = 840),
        'milliseconds' => $faker->numberBetween($min = 1, $max = 99),
        'points' => $faker->numberBetween($min = 0, $max = 10),
    ];
});
