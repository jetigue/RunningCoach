<?php

namespace App\Models\Training\RunningActivities;

use App\Models\Training\Intensity;
use App\Models\Training\RunTypes\Interval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IntervalRun extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'interval_runs';

    /**
     * Fillable fields for a interval run.
     *
     *@var array
     */
    protected $fillable = [
        'beginner',
        'duration',
        'duration_unit',
        'interval_run_type_id',
        'junior_varsity',
        'notes',
        'number_repetitions',
        'number_sets',
        'open',
        'recovery',
        'recovery_unit',
        'training_intensity_id',
        'varsity',
        'workout',
    ];

    /**
     * @return BelongsTo
     */
    public function runType() {
        return $this->belongsTo(Interval::class, 'interval_run_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function intensity() {
        return $this->belongsTo(Intensity::class, 'training_intensity_id');
    }
}
