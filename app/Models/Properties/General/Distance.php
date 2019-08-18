<?php

namespace App\Models\Properties\General;

use App\Models\Properties\Races\TrackEvent;
use Illuminate\Database\Eloquent\Model;


class Distance extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'distances';

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
        return '/distances/' . $this->id;
    }

    public function event()
    {
        $this->belongsTo(TrackEvent::class);
    }
}
