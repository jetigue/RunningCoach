<?php

namespace App\Filters;

use App\Models\Properties\Races\TrackEvent;

class EventFilter extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['event'];

    /**
     * Filter the query by an event.
     *
     * @param string $eventSlug
     * @return Builder
     */
    protected function event($eventSlug)
    {
        $event = TrackEvent::where('slug', $eventSlug)->firstOrFail();

        return $this->builder->where('id', $event->id);
    }
}
