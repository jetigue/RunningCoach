<?php

namespace App\Http\Controllers\Meets;

use App\Models\Meets\TrackMeet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackMeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trackMeets = TrackMeet::with('host', 'venue', 'timing', 'season', 'name')->get();

       if (request()->expectsJson())
        {
            return $trackMeets;
        }

        return view('meets.track.index', compact('trackMeets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function show(TrackMeet $trackMeet)
    {
        return view('meets.track.show', compact('trackMeet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackMeet $trackMeet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackMeet $trackMeet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackMeet $trackMeet)
    {
        //
    }
}
