<?php

namespace App\Models\Properties\Meets;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timing_methods';

    /**
     * Fillable fields for a Track Venue.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get a string path for the host.
     *
     * @return string
     */
    public function path()
    {
        return '/timing/'.$this->id;
    }
}
