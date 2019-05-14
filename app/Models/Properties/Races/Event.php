<?php

namespace App\Models\Properties\Races;

use Illuminate\Support\Str;
use App\Filters\EventFilter;
use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\General\Distance;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * Fillable fields for a Track Venue.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'meters',
    ];

    /**
     * Get a string path for the event.
     *
     * @return string
     */
    public function path()
    {
        return '/events/'.$this->slug;
    }

    /**
     * Save a slug on store and update.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($event) {
            $event->slug = Str::slug($event->name);
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
}
