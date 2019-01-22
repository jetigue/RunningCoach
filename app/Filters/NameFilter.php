<?php

namespace App\Filters;
use App\Models\Properties\General\Season;

class NameFilter extends Filters
{
    /**
     * Registered filters to operate upon.
     * 
     * @var array
     */
    protected $filters = ['season', 'season2', 'season3'];

    /**
     * Filter the query by a season.
     * 
     * @param string $seasonSlug
     * @return Builder
     */
    protected function season($seasonSlug)
    {
      $season = Season::where ('slug', $seasonSlug)->firstOrFail();

      return $this->builder->where('season_id', $season->id)->with('season');

        //     $names = Name::where('season_id', $season->id)->with('season')->orderBy('name');

        // $names = $names->get();

        // return $names;
    }
    

}