<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'athletes';

  /**
    * Fillable fields for an athlete.
    *
    *@var array
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'grad_year',
        'status',
        'dob',
        'team_id',
        'user_id'
        ];

  /**
     * Get a string path for the division.
     *
     * @return string
     */
    public function path()
    {
        return '/athletes/' . $this->id;
    }

}
