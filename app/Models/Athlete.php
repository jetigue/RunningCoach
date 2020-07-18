<?php

namespace App\Models;

use App\Filters\AthleteFilter;
use App\Models\Physical;
use App\Models\Results\CrossCountry\Result;
use App\Models\Training\Group;
use App\Traits\VDOTTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Athlete extends Model
{
    use Searchable;

    protected $with = [
        'crossResults',
        'trackResults',
        'xcTimeTrialResults',
        'trackTimeTrialResults',
        'trainingGroup'
    ];

//    protected $appends = [
//        'latestXCVDOT'
//    ];
//
//    public function getLatestXCVDOTAttribute()
//    {
//        return Result::where('athlete_id', $this->id)
//            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
//            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
//            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
//            ->orderBy('cross_country_meets.meet_date', 'desc')
//            ->take(1)
//            ->value('vdot');
//    }
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
        'user_id',
        'training_group_id'
        ];

    /**
     * Get a string path for the division.
     *
     * @return string
     */
    public function path()
    {
        return '/athletes/'.$this->id;
    }

    /**
     * Save a slug on store and update.
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($athlete) {
            $athlete->slug = Str::slug(
                $athlete->first_name.'-'.$athlete->last_name.'-'.$athlete->grad_year
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

    /**
     * @return BelongsTo
     */
    public function trainingGroup()
    {
        return $this->belongsTo(Group::class,'training_group_id');
    }

    /**
     * @return HasMany
     */
    public function crossResults()
    {
        return $this->hasMany(Result::class)->with('teamResult', 'teamResult.crossCountryMeet');
    }

    /**
     * @return HasMany
     */
    public function xcTimeTrialResults()
    {
        return $this->hasMany(\App\Models\TimeTrials\CrossCountry\Result::class);
    }

    /**
     * @return HasMany
     */
    public function trackTimeTrialResults()
    {
        return $this->hasMany(\App\Models\TimeTrials\Track\Result::class);
    }

    /**
     * @return HasMany
     */
    public function trackResults()
    {
        return $this->hasMany(Results\Track\Result::class);
    }

}
