<?php

namespace App\Models\Training;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingPhase extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_phases';

    /**
     * Fillable fields for an training phase
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'description',
        'training_period_id'
    ];

    /**
     * @return BelongsTo
     */
    public function trainingPeriod()
    {
        return $this->belongsTo(TrainingPeriod::class, 'training_period_id');
    }
}
