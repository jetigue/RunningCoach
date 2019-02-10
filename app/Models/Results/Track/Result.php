<?php

namespace App\Models\Results\Track;

use App\Models\Athlete;
use App\Filters\TrackResultFilter;
use App\Models\Results\Track\TeamResult;
use App\Models\Properties\Races\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'track_meet_result_id',
        'athlete_id',
        'event_id',
        'place',
        'minutes',
        'seconds',
        'milliseconds',
        'points'
    ];

    /**
     * Save total seconds on create and update
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($result) {

            $result->total_seconds = ($result->minutes * 60 + $result->seconds);

        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teamResult()
    {
        return $this->belongsTo(TeamResult::class, 'track_team_result_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
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
