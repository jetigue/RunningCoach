<?php

namespace App\Models\Meets;

use App\Models\Properties\Meets\CrossCountry\Venue;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Races\Division;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;

class CrossCountryMeet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_meets';

    /**
     * Fillable fields for a TimeTrial Meet.
     *
     * @var array
     */
    protected $fillable = [
        'meet_name_id',
        'meet_date',
        'host_id',
        'cross_country_venue_id',
        'timing_method_id',
    ];

    /**
     * @return string
     */
    public function path()
    {
        return '/cross-country/meets/'.$this->slug;
    }

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

        static::saving(function ($crossCountryMeet) {
            $crossCountryMeet->slug = Str::slug($crossCountryMeet->name->name.'-'.$crossCountryMeet->meet_date);
        });
    }

    /**
     * @return BelongsTo
     */
    public function name()
    {
        return $this->belongsTo(Name::class, 'meet_name_id');
    }

    /**
     * @return BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id');
    }

    /**
     * @return BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'cross_country_venue_id');
    }

    /**
     * @return BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_method_id');
    }

    /**
     * @return HasMany
     */
    public function teamResults()
    {
        return $this->hasMany(TeamResult::class);
    }

    /**
     * @return HasManyThrough
     */
    public function results()
    {
        return $this->hasManyThrough(Result::class, TeamResult::class, 'cross_country_meet_id', 'cross_country_team_result_id', 'id', 'id');
    }

    /**
     * @param $teamResult
     * @return Model
     */
    public function addTeamResult($teamResult)
    {
        return $this->teamResults()->create($teamResult);
    }
}
