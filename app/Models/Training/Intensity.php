<?php

namespace App\Models\Training;

use Illuminate\Database\Eloquent\Model;

class Intensity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_intensities';

    /**
     * Fillable fields for an intensity.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'description',
        'percentVO2Max',
        'percentHRMax',
        'purpose',
        'sources'
    ];
}
