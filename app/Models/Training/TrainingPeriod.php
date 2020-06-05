<?php

namespace App\Models\Training;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingPeriod extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_periods';

    /**
     * Fillable fields for a training period.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * @return HasMany
     */
    public function trainingPhases()
    {
        return $this->hasMany(TrainingPhase::class);
    }
}
