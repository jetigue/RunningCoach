<?php

namespace App\Models\Runninglog;

use Illuminate\Database\Eloquent\Model;

class RunEffort extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'run_efforts';

    /**
     * Fillable fields for a run_type.
     *
     *@var array
     */
    protected $fillable = ['name', 'description'];
}
