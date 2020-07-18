<?php

namespace App\Models\TimeTrials\CrossCountry;

use App\Models\Athlete;
use App\Models\Properties\Races\CrossCountry\Event;
use App\Traits\ResultsTrait;
use App\Traits\VDOTTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Result extends Model
{
    use VDOTTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'xc_time_trial_results';

    /**
     * Fillable fields for a cross_country time trial result.
     *
     *@var array
     */
    protected $fillable = [
        'xc_time_trial_race_id',
        'athlete_id',
        'total_seconds',
        'milliseconds',
        'place',
    ];

    /**
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class, 'xc_time_trial_race_id');
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

    public function distance()
    {
        return $this->race->event->meters;
    }
}
