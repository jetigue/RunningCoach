<?php

namespace App\Models\Properties\Meets;

use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\General\Season;

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

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }
}
