<?php

namespace App\Models\Properties\General;

use App\Models\Meets\TrackMeet;
use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\Meets\CrossCountry\Venue;
use App\Models\Properties\Meets\Name;
use App\Filters\SeasonFilter;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seasons';

    /**
     * Fillable fields for a Season
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Save a slug on store and update
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }

    /**
     * Get a string path for the season.
     *
     * @return string
     */
    public function path()
    {
        return '/seasons/' . $this->slug;
    }

<<<<<<< HEAD

=======
>>>>>>> feature-timeTrials
    /**
     * @return HasMany
     */
    public function meetNames()
    {
        return $this->hasMany(Name::class);
    }

    /**
     * @return HasMany
     */
    public function trackMeets()
    {
        return $this->hasMany(TrackMeet::class);
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param SeasonFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, SeasonFilter $filters)
    {
        return $filters->apply($query);
    }
}
