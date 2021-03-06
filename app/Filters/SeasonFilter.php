<?php

namespace App\Filters;

use App\Models\Properties\General\Season;
use Illuminate\Database\Eloquent\Builder;

class SeasonFilter extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['season', 'track'];

    /**
     * Filter the query by a season.
     *
     * @param string $seasonSlug
     * @return Builder
     */
    protected function season($seasonSlug)
    {
        $season = Season::where('slug', $seasonSlug)->firstOrFail();

        return $this->builder->where('slug', $season->slug);
    }

    /**
     * Filter the query by a season.
     *
     * @return Builder
     */
    protected function track()
    {
        return $this->builder
      ->where('slug', 'indoor-track')
      ->orWhere('slug', 'outdoor-track');
    }
}
