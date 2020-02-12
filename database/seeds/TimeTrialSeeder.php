<?php

use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\Result;
use App\Models\TimeTrials\Track\TimeTrial;
use Illuminate\Database\Seeder;

class TimeTrialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TimeTrial::class, 5)->create();
        factory(Race::class, 20)->create();
        factory(Result::class, 100)->create();
    }
}
