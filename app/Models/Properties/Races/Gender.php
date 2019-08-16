<?php

namespace App\Models\Properties\Races;

use App\Models\Results\Track\TeamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genders';

    /**
     * Fillable fields for a Gender
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
        return '/genders/' . $this->id;
    }

    /**
     * @return HasMany
     */
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
