<?php

namespace App\Models\Properties\Meets\CrossCountry;

use App\Filters\NameFilter;
use App\Models\Meets\CrossCountryMeet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Name extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_meet_names';

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
        return '/cross-country/meet-names/'.$this->id;
    }

    public function apiPath()
    {
        return 'api/cross-country/meet-names/'.$this->id;
    }


    /**
     * @return HasMany
     */
    public function crossCountryMeets()
    {
        return $this->hasMany(CrossCountryMeet::class, 'cross_country_meet_name_id');
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
