<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Physical extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'physicals';

    /**
     * Fillable fields for an athlete.
     *
     *@var array
     */
    protected $fillable = [
        'athlete_id',
        'consent_form',
        'concussion_form',
        'evaluation_form',
        'exam_date',
        'restrictions',
        'notes'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }
}