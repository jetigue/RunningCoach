<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class TeamEvent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team_events';

    /**
     * Fillable fields for a team event.
     *
     *@var array
     */
    protected $fillable = [
        'name',
        'event_date',
        'event_time',
        'location',
        'details',
        'link',
        'link_text',
    ];
}
