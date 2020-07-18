<?php

namespace App\Models\Results\CrossCountry;

use App\Models\Athlete;
use App\Traits\VDOTTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use VDOTTrait;

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
     * @return mixed
     */
    public function distance()
    {
        return $this->teamResult->event->meters;
    }

    /**
     * @return BelongsTo
     */
    public function teamResult()
    {
        return $this->belongsTo(TeamResult::class, 'cross_country_team_result_id')
            ->with('crossCountryMeet');
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

}
