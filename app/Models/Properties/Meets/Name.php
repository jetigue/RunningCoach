<?php

namespace App\Models\Properties\Meets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Properties\General\Season;
use App\Filters\NameFilter;
use App\Models\Meets\CrossCountryMeet;
use App\Models\Meets\TrackMeet;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Name extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meet_names';

    /**
     * Fillable fields for a TimeTrial Venue
     *
     * @var array
     */
    protected $fillable = ['name', 'season_id'];

    /**
     * Get a string path for the venue.
     *
     * @return string
     */
    public function path()
    {
        return '/meet-names/' . $this->id;
    }

    public function apiPath()
    {
        return 'api/meet-names/' . $this->id;
    }

    /**
     * @return BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    /**
     * @return HasMany
     */
    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class);
    }

    /**
     * @return HasMany
     */
    public function crossCountryMeets()
    {
        return $this->hasMany(CrossCountryMeet::class);
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param NameFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, NameFilter $filters)
    {
        return $filters->apply($query);
    }
}
