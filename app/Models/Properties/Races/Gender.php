<?php

namespace App\Models\Properties\Races;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genders';

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
        return '/genders/'.$this->id;
    }
}
