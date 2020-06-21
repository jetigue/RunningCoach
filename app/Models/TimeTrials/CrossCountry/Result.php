<?php

namespace App\Models\TimeTrials\CrossCountry;

use App\Models\Athlete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
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
     * @return string
     */
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
     * @return false|string
     */
    public function getTimeAttribute()
    {
        $seconds = $this->attributes['total_seconds'];

        return gmdate('i:s', $seconds);
    }

    /**
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(TimeTrial::class, 'xc_time_trial_race_id');
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

    /**
     * @return string
     */
    public function getMillisecondAttribute()
    {
        return str_pad($this->milliseconds, 2, '0', STR_PAD_LEFT);
    }
}
