<?php

namespace App\Models\Properties\Meets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Properties\General\Season;
use App\Filters\NameFilter;
use App\Models\Meets\TrackMeet;

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

    public function apiPath()
    {
        return 'api/meetNames/' . $this->id;
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class, 'meet_name_id');
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
