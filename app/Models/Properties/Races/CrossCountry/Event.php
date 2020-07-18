<?php

namespace App\Models\Properties\Races\CrossCountry;

use App\Filters\EventFilter;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use App\Models\TimeTrials\CrossCountry\Race;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_events';

    /**
     * Fillable fields for a Cross Country Event.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'meters',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get a string path for the event.
     *
     * @return string
     */
    public function path()
    {
        return '/cross-country-events/'.$this->slug;
    }

    /**
     * Save a slug on store and update.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($event) {
            $event->slug = Str::slug($event->name);
        });
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param EventFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, EventFilter $filters)
    {
        return $filters->apply($query);
    }

    /**
     * @return HasMany
     */
    public function crossCountryTeamResults()
    {
        return $this->hasMany(TeamResult::class, 'cross_country_event_id');
    }

    /**
     * @return HasMany
     */
    public function timeTrialRace()
    {
        return $this->hasMany(Race::class);
    }

    /**
     * @return HasManyThrough
     */
    public function crossCountryResults()
    {
        return $this->hasManyThrough(
            Result::class,
            TeamResult::class,
            'cross_country_event_id',
            'cross_country_team_result_id');
    }
}
