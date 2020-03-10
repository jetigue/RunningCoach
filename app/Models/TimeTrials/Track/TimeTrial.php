<?php

namespace App\Models\TimeTrials\Track;

use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Track\Venue;
use App\Models\Properties\Races\Track\Event;
use App\Models\TimeTrials\Track\Race;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeTrial extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_time_trials';

    /**
     * Fillable fields for a track time trial.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'trial_date',
        'track_venue_id',
        'timing_method_id',
    ];

    /* @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * @return string
     */
    public function path()
    {
        return '/track/time-trials/'.$this->id;
    }

    /**
     * @return BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'track_venue_id');
    }

    /**
     * @return BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_method_id');
    }

    /**
     * @return HasMany
     */
    public function races()
    {
        return $this->hasMany(\App\Models\TimeTrials\Track\Race::class, 'track_time_trial_id');
    }

    /**
     * @param $race
     * @return Model
     */
    public function addRace($race)
    {
        return $this->races()->create($race);
    }
}
