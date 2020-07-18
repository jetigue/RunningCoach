<?php

namespace App\Models\TimeTrials\Track;

use App\Models\Athlete;
use App\Models\Properties\Races\Track\Event;
use App\Traits\VDOTTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Result extends Model
{
    use VDOTTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_time_trial_race_results';

    /**
     * Fillable fields for a track time trial result.
     *
     *@var array
     */
    protected $fillable = [
        'track_time_trial_race_id',
        'athlete_id',
        'heat',
        'total_seconds',
        'milliseconds',
        'place',
    ];

    public function distance()
    {
        $meters = $this->race->event->meters;
        if ($meters >= 1600) {
            return $meters;
        }
        return null;
    }

    /**
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class, 'track_time_trial_race_id');
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

}
