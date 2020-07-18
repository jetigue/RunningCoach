<?php

namespace App\Models\Results\Track;

use App\Filters\TrackResultFilter;
use App\Models\Athlete;
use App\Models\Properties\Races\Track\Event;
use App\Traits\VDOTTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use VDOTTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_results';

    /**
     * Fillable fields for a Season.
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
        'heat',
    ];

    public function distance()
    {
        return $this->event->meters;
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
