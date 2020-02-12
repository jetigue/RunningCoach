<?php

namespace App\Models\Properties\Meets\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\General\Season;
use App\Filters\VenueFilter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_venues';

    /**
     * Fillable fields for a Cross Country Venue
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
        return '/cross-country-venues/' . $this->id;
    }

    /**
     * @return BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * @return HasMany
     */
    public function crossCountryMeets()
    {
        return $this->hasMany(CrossCountryMeet::class, 'cross_country_venue_id');
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
