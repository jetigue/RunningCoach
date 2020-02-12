<?php

namespace App\Models\Properties\General;

use App\Models\Properties\Meets\Track\Venue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrackSurface extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_surfaces';

    /**
     * Fillable fields for a Track Surface
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * @return HasMany
     */
    public function trackVenues()
    {
        return $this->HasMany(Venue::class, 'track_venue_id');
    }
}
