<?php

namespace App\Models\TimeTrials\CrossCountry;

use App\Models\Properties\Meets\CrossCountry\Venue;
use App\Models\Properties\Meets\Timing;
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
    protected $table = 'xc_time_trials';

    /**
     * Fillable fields for a track time trial.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'trial_date',
        'cross_country_venue_id',
        'timing_method_id',
    ];

    /**
     * @return string
     */
    public function path()
    {
        return '/cross-country/time-trials/'.$this->id;
    }

    /**
     * @return BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'cross_country_venue_id');
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
        return $this->hasMany(Race::class, 'xc_time_trial_id');
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
