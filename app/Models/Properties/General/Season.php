<?php

namespace App\Models\Properties\General;

use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\Meets\Venue;

class Season extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seasons';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get a string path for the host.
     *
     * @return string
     */
    public function path()
    {
        return '/seasons/' . $this->id;
    }

    public function venue()
    {
        return $this->hasMany(Venue::class);
    }
}
