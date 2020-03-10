<?php

use App\Models\Properties\General\DayTime;
use App\Models\Properties\General\TerrainType;
use App\Models\Runninglog\RunEffort;
use App\Models\Runninglog\RunFeeling;
use App\Models\RunningLog\RunningLog;
use App\Models\RunningLog\RunType;
use Illuminate\Database\Seeder;

class RunningLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DayTime::class, 5)->create();
        factory(TerrainType::class, 5)->create();
        factory(RunType::class, 4)->create();
        factory(RunEffort::class, 4)->create();
        factory(RunFeeling::class, 4)->create();
        factory(RunningLog::class, 100)->create();
    }
}
