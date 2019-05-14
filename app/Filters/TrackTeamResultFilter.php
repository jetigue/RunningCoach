<?php

namespace App\Filters;

use App\Models\Properties\General\Season;

class TrackTeamResultFilter extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['season', 'track', 'event'];

    /**
     * Filter the query by a season.
     *
     * @param string $seasonSlug
     * @return Builder
     */
    protected function season($seasonSlug)
    {
        $season = Season::where('slug', $seasonSlug)->firstOrFail();

        return $this->builder->where('season_id', $season->id);
    }

    /**
     * Filter the query by a track-season.
     *
     * @param string $seasonSlug
     * @return Builder
     */
    protected function track()
    {
        $indoor = Season::where('slug', 'indoor-track')->firstOrFail();
        $outdoor = Season::where('slug', 'outdoor-track')->firstOrFail();

        return $this->builder
      ->where('season_id', $indoor->id)
      ->orWhere('season_id', $outdoor->id);
    }

    /**
     * Filter the query by an event.
     *
     * @param string $eventSlug
     * @return Builder
     */
    protected function event($eventSlug, $teamResult)
    {
        $event = Event::where('slug', $eventSlug)->firstOrFail();

        return $this->builder->where('event_id', $event->id);
    }
}
