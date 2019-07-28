<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\AthleteFilter;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function physicals()
    {
        return $this->hasMany(Physical::class);
    }

    public function latestPhysical()
    {
        return $this->hasOne(Physical::class)->latest();
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
