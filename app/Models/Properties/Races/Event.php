<?php

namespace App\Models\Properties\Races;

use App\Models\Properties\General\Distance;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'meters'
    ];

    /**
     * Get a string path for the host.
     *
     * @return string
     */
    public function path()
    {
        return '/events/' . $this->id;
    }

    public function distance()
    {
        $this->hasMany(Distance::class);
    }
}
