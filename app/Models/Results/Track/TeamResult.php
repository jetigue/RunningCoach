<?php

namespace App\Models\Results\Track;

use App\Filters\TrackTeamResultFilter;
use App\Models\Meets\TrackMeet;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use App\Models\Results\Track\Result;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class TeamResult extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_team_results';

    /**
     * Fillable fields for a Season.
     *
     * @var array
     */
    protected $fillable = [
        'track_meet_id',
        'division_id',
        'place',
        'number_teams',
        'points',
        'notes',
    ];

    /**
     * Save a slug on store and update.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($teamResult) {
            $teamResult->slug = Str::slug(
                $teamResult->division->gender->name.'-'.
                $teamResult->division->level->name
            );
        });
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * @return BelongsTo
     */
    public function trackMeet()
    {
        return $this->belongsTo(TrackMeet::class, 'track_meet_id');
    }

    /**
     * @return BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    /**
     * @return HasMany
     */
    public function results()
    {
        return $this->hasMany(\App\Models\Results\Track\Result::class, 'track_team_result_id');
    }

    /**
     * @param $results
     * @return Model
     */
    public function addResults($results)
    {
        return $this->results()->create($results + ['total_seconds' => request('minutes') * 60 + request('seconds')]);
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param TrackTeamResultFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, TrackTeamResultFilter $filters)
    {
        return $filters->apply($query);
    }
}
