<?php

namespace App\Models\Properties\Meets\Track;

use App\Models\Meets\TrackMeet;
use App\Models\Properties\General\TrackSurface;
use App\Models\TimeTrials\Track\TimeTrial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_venues';

    /**
     * Fillable fields for a Track Venue.
     *
     * @var array
     */
    protected $fillable = ['name', 'track_surface_id'];

    /**
     * Get a string path for the venue.
     *
     * @return string
     */
    public function path()
    {
        return '/track-venues/'.$this->id;
    }

    /**
     * @return BelongsTo
     */
    public function surface()
    {
        return $this->belongsTo(TrackSurface::class, 'track_surface_id');
    }

    /**
     * @return HasMany
     */
    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class);
    }
}
