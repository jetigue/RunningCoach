<?php

namespace App\Models\Runninglog;

use Illuminate\Database\Eloquent\Model;

class RunFeeling extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'run_feelings';

    /**
     * Fillable fields for a run_type.
     *
     *@var array
     */
    protected $fillable = ['name', 'description'];
}
