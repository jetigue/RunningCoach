<?php

namespace App\Models\Properties\Races;

use App\Models\Results\Track\Result;
use Illuminate\Database\Eloquent\Model;
use App\Filters\EventFilter;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'meters'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Get a string path for the event.
     *
     * @return string
     */
    public function path()
    {
        return '/events/' . $this->slug;
    }

    /**
     * Save a slug on store and update
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($event) {
            $event->slug = str_slug($event->name);
        });
    }

    /**
     * Apply all relevant name filters.
     * 
     * @param Builder $query
     * @param EventFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, EventFilter $filters)
    {
        return $filters->apply($query);
    }

    public function trackResults()
    {
        return $this->hasMany(Result::class);
    }

}