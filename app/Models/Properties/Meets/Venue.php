<?php

namespace App\Models\Properties\Meets;

use App\Models\Meets\TrackMeet;
use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\General\Season;
use App\Filters\VenueFilter;

class Venue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'venues';

    /**
     * Fillable fields for a Track Venue
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
        return '/venues/' . $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class);
    }

    /**
     * Apply all relevant venue filters.
     * 
     * @param Builder $query
     * @param NameFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, VenueFilter $filters)
    {
        return $filters->apply($query);
    }
}
