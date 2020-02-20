<?php

namespace App\Http\Controllers\Results\Track;

use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
use App\Models\Meets\TrackMeet;
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
     * @param Result $result
     * @return Factory|View
     */
    public function show(TrackMeet $trackMeet, TeamResult $teamResult, Result $result)
    {
        $results = Result::where('track_team_result_id', $teamResult->id)
            ->with('teamResult', 'athlete', 'event')->get();

        return view('results.track.teamResults.show', compact('teamResult', 'results'));
    }

}
