<?php

namespace App\Repositories;

use App\Models\Properties\Races\Track\Event;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;

class TrackResults
{
    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results400m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 400)->firstOrFail();

        return $results400m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results800m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 800)->firstOrFail();

        return $results800m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results1000m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 1000)->firstOrFail();

        return $results1000m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results1200m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 1200)->firstOrFail();

        return $results1200m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results1500m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 1500)->firstOrFail();

        return $results1500m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results1600m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 1600)->firstOrFail();

        return $results1600m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results3000m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 3000)->firstOrFail();

        return $results3000m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results3200m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 3200)->firstOrFail();

        return $results3200m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results5000m(TeamResult $teamResult)
    {
        $event = Event::where('meters', 5000)->firstOrFail();

        return $results5000m = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results1mile(TeamResult $teamResult)
    {
        $event = Event::where('meters', 1609)->firstOrFail();

        return $results1mile = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

    /**
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function results2mile(TeamResult $teamResult)
    {
        $event = Event::where('meters', 3218)->firstOrFail();

        return $results2mile = Result::orderBy('track_event_id', 'asc')
            ->where('track_team_result_id', $teamResult->id)
            ->where('track_event_id', $event->id)
            ->orderBy('place', 'asc')
            ->with('teamResult', 'athlete', 'event')
            ->get();
    }

}
