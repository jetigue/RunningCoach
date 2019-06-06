<?php

namespace App\Models\RunningLog;

use Illuminate\Database\Eloquent\Model;

class RunType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'run_types';

    /**
     * Fillable fields for a run_type.
     *
     *@var array
     */
    protected $fillable = ['name', 'description'];
}
