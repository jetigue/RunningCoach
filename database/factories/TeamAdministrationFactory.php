<?php
use App\Models\Team\Announcement;
use Faker\Generator as Faker;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'begin_date' => $faker->date,
        'end_date' => $faker->date,
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'body'  => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'link_1' => 'http://www.longhorndistance.com',
        'link_text_1' => 'Longhorn Distance'
    ];
});
