<?php

namespace App\Models\Properties\Meets;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Meets\TrackMeet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Host extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hosts';

    /**
     * Fillable fields for a TimeTrial Venue.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get a string path for the host.
     *
     * @return string
     */
    public function path()
    {
        return '/hosts/'.$this->id;
    }

    /**
     * @return HasMany
     */
    public function crossCountryMeets()
    {
        return $this->hasMany(CrossCountryMeet::class);
    }

    /**
     * @return HasMany
     */
    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class);
    }
}
