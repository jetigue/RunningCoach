<?php

use App\Models\Training\Group;
use App\Models\Training\Intensity;
use App\Models\Training\RunTypes\Interval;
use App\Models\Training\RunTypes\Steady;
use App\Models\Training\TrainingDay;
use App\Models\Training\TrainingPeriod;
use App\Models\Training\TrainingPhase;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Interval::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});

$factory->define(Steady::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});

$factory->define(TrainingPeriod::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});

$factory->define(TrainingPhase::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'training_period_id' => $faker->numberBetween(1,3)
    ];
});

$factory->define(TrainingDay::class, function (Faker $faker) {
    return [
        'training_date' => 2020 . '-' . 5 . '-' .$faker->unique()->numberBetween(1,30),
        'training_phase_id' => $faker->numberBetween(1,3)
    ];
});

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'color' => '666666'
    ];
});

$factory->define(Intensity::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
        'percentVO2Max' => $faker->numberBetween(75,100),
        'percentHRMax'=> $faker->numberBetween(75,100),
        'purpose' => $faker->sentence(),
        'sources' => $faker->name()
    ];
});
