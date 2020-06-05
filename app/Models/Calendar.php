<?php

namespace App\Models;

use App\Models\Training\RunningActivities\IntervalRun;
use App\Models\Training\RunningActivities\SteadyRun;
use App\Models\Training\Workout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Calendar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar';

    /**
     * @return HasMany
     */
    public function steadyRuns()
    {
        return $this->hasMany(SteadyRun::class, 'training_date', 'calendar_date');
    }

    /**
     * @param $steadyRun
     * @return Model
     */
    public function addSteadyRun($steadyRun)
    {
        return $this->steadyRuns()->create($steadyRun);
    }

    /**
     * @return HasMany
     */
    public function intervalRuns()
    {
        return $this->hasMany(IntervalRun::class, 'training_date', 'calendar_date');
    }

    /**
     * @param $intervalRun
     * @return Model
     */
    public function addIntervalRun($intervalRun)
    {
        return $this->intervalRuns()->create($intervalRun);
    }

    /**
     * @return HasMany
     */
    public function workouts()
    {
        return $this->hasMany(Workout::class, 'workout_date', 'calendar_date');
    }

    /**
     * @param $workouts
     * @return Model
     */
    public function addWorkout($workouts)
    {
        return $this->workouts()->create($workouts);
    }
}
