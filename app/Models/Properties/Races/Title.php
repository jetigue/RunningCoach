<?php

namespace App\Models\Properties\Races;

use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Title extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'race_titles';

    /**
     * Fillable fields for a Division Title
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function crossCountryTeamResults()
    {
        return $this->hasMany(TeamResult::class);
    }
}
