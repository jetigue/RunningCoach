<?php

namespace App\Http\Controllers\Results\Track;

use App\Models\Results\Track\TeamResult;
use App\Models\Meets\TrackMeet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamResults = TeamResult::with('gender', 'division')->get();

        if (request()->expectsJson()) {
            return $teamResults;
        }

        return view('results.track.team.index', compact('teamResults'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Results\Track\TeamResult  $teamResult
     * @return \Illuminate\Http\Response
     */
    public function show(TrackMeet $trackMeet, TeamResult $teamResult)
    {
        return view('results.track.teamResults.show', compact('teamResult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Results\Team\TrackResult  $trackResult
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackResult $trackResult)
    {
        //
    }
}
