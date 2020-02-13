<?php

namespace App\Models\Properties\Meets\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use Illuminate\Database\Eloquent\Model;
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
    protected $fillable = ['name'];

    /**
     * Get a string path for the venue.
     *
     * @return string
     */
    public function path()
    {
        return '/cross-country/venues/' . $this->id;
    }

    /**
     * @return HasMany
     */
    public function crossCountryMeets()
    {
        return $this->hasMany(CrossCountryMeet::class, 'cross_country_venue_id');
    }
}
