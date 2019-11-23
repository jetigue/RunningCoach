<?php

use Faker\Generator as Faker;
use App\Models\Athlete;

$factory->define(Athlete::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'sex'        => $faker->randomElement($array = array('m', 'f')),
        'grad_year'  => $faker->randomElement($array = array(2020, 2021, 2022, 2023)),
        'dob'        => $faker->date($format = 'Y-m-d', $max = '2005-01-01'),
        'status'     => $faker->randomElement($array = array('a', 'i')),
    ];
});
