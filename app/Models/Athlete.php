<?php

namespace App\Models;

use App\Models\Physical;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\AthleteFilter;
use App\Models\Results\CrossCountry\Result;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Athlete extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'athletes';

  /**
    * Fillable fields for an athlete.
    *
    *@var array
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'grad_year',
        'status',
        'dob',
        'user_id'
        ];

  /**
     * Get a string path for the division.
     *
     * @return string
     */
    public function path()
    {
        return '/athletes/' . $this->id;
    }

    /**
     * Save a slug on store and update
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($athlete) {

            $athlete->slug = str_slug(
                $athlete->first_name . '-' . $athlete->last_name . '-' . $athlete->grad_year
            );
        });
    }

    /**
     * @return HasMany
     */
    public function physicals()
    {
        return $this->hasMany(Physical::class);
    }

    public function latestPhysical()
    {
        return $this->hasOne(Physical::class)->latest();
    }

    public function crossResults()
    {
        return $this->hasMany(Result::class)->latest();
    }

    public function getLowestAttribute()
    {
        $fastest5k = $this->crossResults()->filter(function ($item) {
            return !is_null($item->total_seconds);
        });

        return $fastest5k->min('total_seconds');
    }

    /**
     * Apply all relevant name filters.
     *
     * @param Builder $query
     * @param AthleteFilter $filters
     * @return Builder
     */
    public function scopeFilter($query, AthleteFilter $filters)
    {
        return $filters->apply($query);
    }

}
