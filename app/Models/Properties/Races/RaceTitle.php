<?php

namespace App\Models\Properties\Races;

use Illuminate\Database\Eloquent\Model;

class RaceTitle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'race_titles';

    /**
     * Fillable fields for a Division Title
     *
     * @var array
     */
    protected $fillable = ['name'];
}
