<?php

namespace App\Models\Properties\Races\Track;

use Illuminate\Support\Str;
use App\Models\Results\Track\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_events';

    /**
     * Fillable fields for a TimeTrial Venue.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'meters',
        'relay',
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
        return '/track-events/'.$this->slug;
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

    /**
     * @return HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'track_event_id');
    }
}
