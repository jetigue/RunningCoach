<?php

namespace App\Models\Properties\Meets;

use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\General\Season;

class Name extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meet_names';

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
        return '/meet-names/' . $this->id;
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }
}
