<?php

use Faker\Generator as Faker;
use App\Models\Meets\TrackMeet;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Timing;

$factory->define(TrackMeet::class, function (Faker $faker) {
    $indoor = Season::where('slug', 'indoor-track')->firstOrfail();
    $outdoor = Season::where('slug', 'outdoor-track')->firstOrfail();
    return [
        'meet_name_id' => Name::where('season_id', $indoor->id)
            ->orWhere('season_id', $outdoor->id)
            ->get()
            ->random()
            ->id,
        'meet_date' => $faker->date($format = 'Y-m-d'),
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
        'timing_method_id' => Timing::all()->random()->id
    ];
});
