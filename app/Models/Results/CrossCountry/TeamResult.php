<?php

namespace App\Models\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamResult extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_team_results';

    /**
     * Fillable fields for a Season
     *
     * @var array
     */
    protected $fillable = [
        'cross_country_meet_id',
        'division_id',
        'event_id',
        'place',
        'number_teams',
        'points'
    ];

    /**
     * Save a slug on store and update
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($teamResult) {

            $teamResult->slug = str_slug(
                $teamResult->division->gender->name . '-' .
                $teamResult->division->level->name . '-'
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
    public function crossCountryMeet()
    {
        return $this->belongsTo(CrossCountryMeet::class, 'cross_country_meet_id');
    }

    /**
     * @return BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    /**
     * @return BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    /**
     * @return HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'cross_country_team_result_id');
    }

    /**
     * @param $results
     * @return Model
     */
    public function addResults($results)
    {
        return $this->results()->create($results);
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param CrossCountryTeamResultFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, CrossCountryTeamResultFilter $filters)
    {
        return $filters->apply($query);
    }
}
