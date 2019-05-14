<?php

namespace App\Models\Properties\General;

use App\Filters\SeasonFilter;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Venue;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seasons';

    /**
     * Fillable fields for a Season.
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
     * Save a slug on store and update.
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
        return '/seasons/'.$this->slug;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function venues()
    {
        return $this->hasMany(Venue::class, 'season_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetNames()
    {
        return $this->hasMany(Name::class);
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
