<?php

namespace Tests\Setup;

use App\Models\Meets\TrackMeet;
use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Venue;

class TrackMeetFactory
{
    public $season = null;
    public $meetName = null;
    public $host = null;
    public $venue = null;

    /**
     * @param Season $season
     * @return $this
     */
    public function duringSeason(Season $season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * @param Name $meetName
     * @return $this
     */
    public function withMeetName(Name $meetName)
    {
        $this->meetName = $meetName;

        return $this;
    }

    /**
     * @param Host $host
     * @return $this
     */
    public function hostedBy(Host $host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param Venue $venue
     * @return $this
     */
    public function atVenue(Venue $venue)
    {
        $this->venue = $venue;

        return $this;
    }

    public function create()
    {
        $season = factory(Season::class)->states('outdoor')->create();

        $trackMeet = factory(TrackMeet::class)->create([
            'meet_name_id' => $this->withMeetName ?? factory(Name::class)->create([
                'season_id' => $season->id
                ]),
            'season_id' => $season->id,
//            'season_id' => $this->duringSeason ?? factory(Season::class)->create(),
            'host_id' => $this->hostedBy ?? factory(Host::class)->create(),
            'venue_id' => $this->atVenue ?? factory(Venue::class)->create([
                'season_id' => $season->id
                ])
        ]);

        return $trackMeet;
    }
}
