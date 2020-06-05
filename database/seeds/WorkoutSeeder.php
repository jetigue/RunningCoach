<?php

use App\Models\Training\Group;
use App\Models\Training\Intensity;
use App\Models\Training\RunTypes\Interval;
use App\Models\Training\RunTypes\Steady;
use App\Models\Training\TrainingDay;
use App\Models\Training\TrainingPeriod;
use App\Models\Training\TrainingPhase;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TrainingPeriod::class, 3)->create();
        factory(TrainingPhase::class, 3)->create();
        factory(TrainingDay::class, 25)->create();
        factory(Group::class, 4)->create();
        factory(Steady::class, 4)->create();
        factory(Interval::class, 4)->create();
        factory(Intensity::class, 5)->create();


    }
}
