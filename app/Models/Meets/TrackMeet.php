<?php

namespace App\Models\Meets;

use App\Filters\TrackMeetFilter;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Timing;
use Illuminate\Database\Eloquent\Model;
use App\Models\Results\Track\TeamResult;
use App\Models\Properties\General\Season;
use Illuminate\Database\Eloquent\Builder;

class TrackMeet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_meets';

    /**
     * Fillable fields for a Track Meet.
     *
     * @var array
     */
    protected $fillable = [
       'meet_name_id',
       'meet_date',
       'season_id',
       'host_id',
       'venue_id',
       'timing_method_id',
       'slug',
   ];

    /**
     * @return string
     */
    public function path()
    {
        return '/track-meets/'.$this->slug;
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Save a slug on store and update.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($trackMeet) {
            $trackMeet->slug = str_slug($trackMeet->name->name.'-'.$trackMeet->meet_date);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function name()
    {
        return $this->belongsTo(Name::class, 'meet_name_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamResults()
    {
        return $this->hasMany(TeamResult::class);
    }

    /**
     * @param $teamResult
     * @return Model
     */
    public function addTeamResult($teamResult)
    {
        return $this->teamResults()->create($teamResult);
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param TrackMeetFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, TrackMeetFilter $filters)
    {
        return $filters->apply($query);
    }
}
