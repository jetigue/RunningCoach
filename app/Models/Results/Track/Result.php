<?php

namespace App\Models\Results\Track;

use App\Models\Athlete;
use App\Filters\TrackResultFilter;
use App\Models\Properties\Races\Track\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_results';

    /**
     * Fillable fields for a Season
     *
     * @var array
     */
    protected $fillable = [
        'track_team_result_id',
        'athlete_id',
        'track_event_id',
        'place',
        'total_seconds',
        'milliseconds',
        'points',
        'heat'
    ];

//    /**
//     * Save total seconds on create and update
//     */
//    public static function boot()
//    {
//        parent::boot();
//
//        static::saving(function ($result) {
//
//            $result->total_seconds = ($result->minutes * 60 + $result->seconds);
//
//        });
//    }

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
    public function teamResult()
    {
        return $this->belongsTo(TeamResult::class, 'track_team_result_id');
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

    /**
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'track_event_id');
    }

    /**
     * @return string
     */
    function getMillisecondAttribute() {
        return str_pad($this->milliseconds,2,'0',STR_PAD_LEFT);
    }


    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param TrackResultFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, TrackResultFilter $filters)
    {
        return $filters->apply($query);
    }
}
