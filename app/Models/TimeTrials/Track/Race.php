<?php

namespace App\Models\TimeTrials\Track;

use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Track\Event;
use App\Models\TimeTrials\Track\Result;
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
    protected $table = 'track_time_trial_races';

    /**
     * Fillable fields for a track time trial race.
     *
     *@var array
     */
    protected $fillable = [
        'track_time_trial_id',
        'gender_id',
        'track_event_id',
        'notes',
    ];

    /**
     * @param $results
     * @return Model
     */
    public function addResults($results)
    {
        return $this->results()->create($results + ['total_seconds' => request('minutes') * 60 + request('seconds')]);
    }

    public function getPlaceWithSuffixAttribute()
    {
        $value = $this->attributes['place'];

        if ($value != null) {
            if (! in_array(($value % 100), [11, 12, 13])) {
                switch ($value % 10) {
                        // Handle 1st, 2nd, 3rd
                        case 1:
                            return $value.'st';
                        case 2:
                            return $value.'nd';
                        case 3:
                            return $value.'rd';
                    }
            }

            return $value.'th';
        }
    }

    /**
     * @return BelongsTo
     */
    public function timeTrial()
    {
        return $this->belongsTo(TimeTrial::class, 'track_time_trial_id');
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
        return $this->belongsTo(Event::class, 'track_event_id');
    }

    /**
     * @return HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'track_time_trial_race_id');
    }
}
