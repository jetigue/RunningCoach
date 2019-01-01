<?php

use App\Models\Properties\Meets\Host;

use Faker\Generator as Faker;

$factory->define(Host::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName . ' ' . 'High School'
    ];
});
