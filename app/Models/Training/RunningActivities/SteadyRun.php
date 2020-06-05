<?php

namespace App\Models\Training\RunningActivities;

use App\Models\Training\Intensity;
use App\Models\Training\RunTypes\Steady;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SteadyRun extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'steady_runs';

    /**
     * Fillable fields for a steady_run.
     *
     *@var array
     */
    protected $fillable = [
        'training_date',
        'steady_run_type_id',
        'duration',
        'duration_unit',
        'training_intensity_id',
        'workout',
        'varsity',
        'junior_varsity',
        'open',
        'beginner',
        'notes'
    ];

    /**
     * @return BelongsTo
     */
    public function runType() {
        return $this->belongsTo(Steady::class, 'steady_run_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function intensity() {
        return $this->belongsTo(Intensity::class, 'training_intensity_id');
    }
}
