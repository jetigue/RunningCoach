<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'announcements';

    /**
     * Fillable fields for an athlete.
     *
     *@var array
     */
    protected $fillable = [
        'title',
        'body',
        'begin_date',
        'end_date',
        'link_1',
        'link_text_1',
        'link_2',
        'link_text_2',
        'link_3',
        'link_text_3'
    ];
}
