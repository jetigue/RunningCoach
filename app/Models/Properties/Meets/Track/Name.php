<?php

namespace App\Models\Properties\Meets\Track;

use App\Filters\NameFilter;
use App\Models\Meets\TrackMeet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Name extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_meet_names';

    /**
     * Fillable fields for a TimeTrial Venue.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get a string path for the venue.
     *
     * @return string
     */
    public function path()
    {
        return '/track/meet-names/'. $this->id;
    }

    /**
     * @return string
     */
    public function apiPath()
    {
        return '/api/track/meet-names/'. $this->id;
    }

    /**
     * @return HasMany
     */
    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class, 'track_meet_name_id');
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
