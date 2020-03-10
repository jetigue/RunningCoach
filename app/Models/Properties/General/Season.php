<?php

namespace App\Models\Properties\General;

use App\Filters\SeasonFilter;
use App\Models\Meets\TrackMeet;
use App\Models\Properties\Meets\Name;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

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
            $model->slug = Str::slug($model->name);
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
