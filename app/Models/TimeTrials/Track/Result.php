<?php

namespace App\Models\TimeTrials\Track;

use App\Models\Athlete;
use App\Models\Properties\Races\Track\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Result extends Model
{
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
        'place'
    ];

    /**
     * @return string
     */
    public function getPlaceWithSuffixAttribute() {
        $value = $this->attributes['place'];

        if ($value != null) {
            if (!in_array(($value % 100), array(11, 12, 13)))
            {
                switch ($value % 10)
                {
                    // Handle 1st, 2nd, 3rd
                    case 1:
                        return $value . 'st';
                    case 2:
                        return $value . 'nd';
                    case 3:
                        return $value . 'rd';
                }
            }
            return $value . 'th';
        }
    }

    /**
     * @return false|string
     */
    public function getTimeAttribute() {
        $seconds = $this->attributes['total_seconds'];

                return gmdate("i:s", $seconds);
    }

    /**
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(TimeTrial::class, 'track_time_trial_race_id');
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
    function getMillisecondAttribute() {
        return str_pad($this->milliseconds,2,'0',STR_PAD_LEFT);
    }
}
