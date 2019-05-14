<?php

namespace App\Models\Results\Track;

use App\Models\Meets\TrackMeet;
use App\Models\Results\Track\Result;
use App\Filters\TrackTeamResultFilter;
use App\Models\Properties\Races\Gender;
use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\Races\Division;
use Illuminate\Database\Eloquent\Builder;

class TeamResult extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_team_results';

    /**
     * Fillable fields for a Season.
     *
     * @var array
     */
    protected $fillable = [
        'track_meet_id',
        'gender_id',
        'division_id',
        'place',
        'number_teams',
        'points',
    ];

    /**
     * Save a slug on store and update.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($teamResult) {
            $teamResult->slug = str_slug(
                $teamResult->gender->name.'-'.
                $teamResult->division->name.'-'.
                $teamResult->track_meet_id.'-'.
                $teamResult->place.'-'.
                $teamResult->number_teams.'-'.
                $teamResult->points
            );
        });
    }

//    public function setSlugAttribute($value)
//    {
//        $slug = str_slug($value);
//
//        if (static::whereSlug($slug= str_slug($value))->exists()) {
//            $slug = "{$slug}-{$this->id}";
//        }
//
//        $this->attributes['slug'] = $slug;
//    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trackMeet()
    {
        return $this->belongsTo(TrackMeet::class, 'track_meet_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'track_team_result_id');
    }

    /**
     * @param $results
     * @return Model
     */
    public function addResults($results)
    {
        return $this->results()->create($results);
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param TrackTeamResultFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, TrackTeamResultFilter $filters)
    {
        return $filters->apply($query);
    }
}
