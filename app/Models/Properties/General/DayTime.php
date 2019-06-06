<?php

namespace App\Models\Properties\General;

use Illuminate\Database\Eloquent\Model;

class DayTime extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'day_times';

    /**
     * Fillable fields for a Time of Day
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
