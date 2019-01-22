<?php

namespace App\Models\Properties\General;

use Illuminate\Database\Eloquent\Model;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Name;

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
        'name', 'slug'
    ];

    /**
     * Get a string path for the season.
     *
     * @return string
     */
    public function path()
    {
        return '/seasons/' . $this->id;
    }

    public function venues()
    {
        return $this->hasMany(Venue::class);
    }

    public function meetNames()
    {
        return $this->hasMany(Name::class);
    }
}
