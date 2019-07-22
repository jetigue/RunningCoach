<?php

namespace App\Models\RunningLog;

use App\Models\Properties\General\DayTime;
use App\Models\Properties\General\TerrainType;
use Illuminate\Database\Eloquent\Model;

class RunningLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'running_logs';

    /**
     * Fillable fields for a run_type.
     *
     *@var array
     */
    protected $fillable = [
        'user_id',
        'run_date',
        'distance',
//        'hours',
//        'minutes',
//        'seconds',
        'milliseconds',
        'total_seconds',
        'day_time_id',
        'run_type_id',
        'terrain_type_id',
        'run_effort_id',
        'run_feeling_id',
        'notes'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dayTime()
    {
        return $this->belongsTo(DayTime::class, 'day_time_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terrainType()
    {
        return $this->belongsTo(TerrainType::class, 'terrain_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function runType()
    {
        return $this->belongsTo(RunType::class, 'run_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function RunEffort()
    {
        return $this->belongsTo(RunEffort::class, 'run_effort_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function runFeeling()
    {
        return $this->belongsTo(RunFeeling::class, 'run_feeling_id');
    }
}
