<?php

namespace App\Models\Training;

use App\Models\Calendar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Workout extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_calendar_workouts';

    /**
     * Fillable fields for an training phase
     *
     *@var array
     */
    protected $fillable = [
        'workout_date',
        'name',
        'training_group_id'
    ];

    /**
     * @return BelongsTo
     */
    public function trainingGroup() {
        return $this->belongsTo(Group::class, 'training_group_id');
    }
}
