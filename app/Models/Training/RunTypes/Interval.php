<?php

namespace App\Models\Training\RunTypes;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'interval_run_types';

    /**
     * Fillable fields for the model.
     *
     *@var array
     */
    protected $fillable = ['name', 'description'];

}
