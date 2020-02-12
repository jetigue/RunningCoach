<?php

namespace App\Models\Properties\Races;

use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'divisions';

    /**
     * Fillable fields for a TimeTrial Venue
     *
     * @var array
     */
    protected $fillable = [
        'gender_id',
        'level_id',
    ];


    /**
     * @return BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }


    /**
     * @return BelongsTo
     */
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    /**
     * @return HasMany
     */
    public function trackTeamResults()
    {
        return $this->hasMany(\App\Models\Results\Track\TeamResult::class);
    }

    /**
     * @return HasMany
     */
    public function crossCountryTeamResults()
    {
        return $this->hasMany(TeamResult::class);
    }

    /**
     * Save a slug on store and update
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($division) {

            $division->name = $division->level->name . ' ' . $division->gender->name;

        });
    }
}
