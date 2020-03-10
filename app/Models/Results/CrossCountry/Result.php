<?php

namespace App\Models\Results\CrossCountry;

use App\Models\Athlete;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_results';

    /**
     * Fillable fields for a Cross Country Result.
     *
     * @var array
     */
    protected $fillable = [
        'cross_country_meet_result_id',
        'athlete_id',
        'place',
        'total_seconds',
        'milliseconds',
        'points',
    ];

    /**
     * Save total seconds on create and update.
     */
//    public static function boot()
//    {
//        parent::boot();
//
//        static::saving(function ($result) {
//
//            $result->total_seconds = $result->minutes * 60 + $result->seconds;
//
//        });
//    }

    /**
     * @return string
     */
    public function getPlaceWithSuffixAttribute()
    {
        $value = $this->attributes['place'];

        if ($value != null) {
            if (! in_array(($value % 100), [11, 12, 13])) {
                switch ($value % 10) {
                    // Handle 1st, 2nd, 3rd
                    case 1:
                        return $value.'st';
                    case 2:
                        return $value.'nd';
                    case 3:
                        return $value.'rd';
                }
            }

            return $value.'th';
        }
    }

    /**
     * @return false|string
     */
    public function getTimeAttribute()
    {
        $seconds = $this->attributes['total_seconds'];

        return gmdate('i:s', $seconds);
    }

    /**
     * @return BelongsTo
     */
    public function teamResult()
    {
        return $this->belongsTo(TeamResult::class, 'cross_country_team_result_id');
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

    /**
     * @return string
     */
    public function getMillisecondAttribute()
    {
        return str_pad($this->milliseconds, 2, '0', STR_PAD_LEFT);
    }

//    /**
//     * Apply all relevant name filters.
//     *
//     * @param Builder $query
//     * @param CrossCountryResultFilter $filters
//     * @return Builder
//     */
//    public function scopeFilter($query, CrossCountryResultFilter $filters)
//    {
//        return $filters->apply($query);
//    }
}
