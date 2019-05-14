<?php

namespace App\Models\Properties\Meets;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hosts';

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
        return '/hosts/'.$this->id;
    }
}
