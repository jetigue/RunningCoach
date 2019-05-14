<?php

use App\Models\Athlete;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Meets\TrackMeet;
use App\Models\Results\Track\Result;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Races\Gender;
use App\Models\Results\Track\TeamResult;
use App\Models\Properties\General\Season;
use App\Models\Properties\Races\Division;

$factory->define(TrackMeet::class, function (Faker $faker) {
    $indoor = Season::where('slug', 'indoor-track')->firstOrfail();
    $outdoor = Season::where('slug', 'outdoor-track')->firstOrfail();
    $name = Name::where('season_id', $indoor->id)
        ->orWhere('season_id', $outdoor->id)
        ->get()
        ->random();
    $date = $faker->date($format = 'Y-m-d');

    return [
        'meet_name_id' => $name->id,
        'meet_date' => $date,
        'season_id' => Season::where('slug', 'outdoor-track')
            ->orWhere('slug', 'indoor-track')
            ->get()->random()
            ->id,
        'host_id' => Host::all()->random()->id,
        'venue_id' => Venue::where('season_id', $indoor->id)
            ->orWhere('season_id', $outdoor->id)
            ->get()
            ->random()
            ->id,
        'timing_method_id' => Timing::all()->random()->id,
        'slug' => Str::slug($name->name).'-'.$date,
    ];
});

$factory->define(TeamResult::class, function (Faker $faker) {
    $gender = Gender::all()->random();
    $division = Division::all()->random();

    return [
        'track_meet_id' => Name::all()->random()->id,
        'division_id' => $division->id,
        'gender_id' => $gender->id,
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
