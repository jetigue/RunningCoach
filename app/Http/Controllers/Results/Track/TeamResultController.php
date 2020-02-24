<?php

namespace App\Http\Controllers\Results\Track;

use App\Models\Properties\Races\Track\Event;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
use App\Models\Meets\TrackMeet;
use App\Repositories\TrackResults;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $teamResults = TeamResult::with('division')->get();

        if (request()->expectsJson()) {

            return $teamResults;
        }

        return view('results.track.teamResults.index', compact('teamResults'));
    }

    /**
     * Display the specified resource.
     *
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @param TrackResults $results
     * @return Factory|View
     */
//    public function show(TrackMeet $trackMeet, TeamResult $teamResult, Result $result)
      public function show(TrackMeet $trackMeet, TeamResult $teamResult, TrackResults $results)
    {
        $results400m = $results->results400m($teamResult);
        $results800m = $results->results800m($teamResult);
        $results1000m = $results->results1000m($teamResult);
        $results1200m = $results->results1200m($teamResult);
        $results1500m = $results->results1500m($teamResult);
        $results1600m = $results->results1600m($teamResult);
        $results1mile = $results->results1mile($teamResult);
        $results3000m = $results->results3000m($teamResult);
        $results3200m = $results->results3200m($teamResult);
        $results2mile = $results->results2mile($teamResult);
        $results5000m = $results->results5000m($teamResult);

        return view('results.track.teamResults.show',
            compact('teamResult',
                'results400m',
                'results800m',
                'results1000m',
                'results1200m',
                'results1500m',
                'results1600m',
                'results1mile',
                'results3000m',
                'results3200m',
                'results2mile',
                'results5000m'
            ));
    }

}
