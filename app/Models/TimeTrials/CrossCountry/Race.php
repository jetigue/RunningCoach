<?php

namespace App\Models\TimeTrials\CrossCountry;

use App\Models\Properties\Races\CrossCountry\Event;
use App\Models\Properties\Races\Gender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'xc_time_trial_races';

    /**
     * Fillable fields for a xc time trial race.
     *
     *@var array
     */
    protected $fillable = [
        'xc_time_trial_id',
        'gender_id',
        'cross_country_event_id',
        'notes',
    ];

    /**
     * @return BelongsTo
     */
    public function timeTrial()
    {
        return $this->belongsTo(TimeTrial::class, 'xc_time_trial_id');
    }

    /**
     * @return BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    /**
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'cross_country_event_id');
    }

    /**
     * @return HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'xc_time_trial_race_id');
    }

    /**
     * @param $results
     * @return Model
     */
    public function addResults($results)
    {
        return $this->results()->create($results + ['total_seconds' => request('minutes') * 60 + request('seconds')]);
    }
}
