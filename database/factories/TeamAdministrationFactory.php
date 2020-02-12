<?php
use App\Models\Team\Announcement;
use App\Models\Team\TeamEvent;
use Faker\Generator as Faker;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'begin_date' => $faker->date,
        'end_date' => '2021-12-31',
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'body'  => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'link_1' => 'http://www.longhorndistance.com',
        'link_text_1' => 'Longhorn Distance'
    ];
});

$factory->define(TeamEvent::class, function (Faker $faker) {
    return [
        'event_date' => '2021-12-31',
        'event_time' => $faker->time(),
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'location' => $faker->city . ', ' . 'GA',
        'details'  => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'link' => 'http://www.longhorndistance.com',
        'link_text' => 'Longhorn Distance'
    ];
});
