<?php

namespace App\Http\Controllers\Properties\Meets;

use App\Models\Properties\Meets\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($seasonSlug = request('season')) {
            $season = Season::where('slug', $seasonSlug)->firstOrFail();
            
            $venues = Venue::where('season_id', $season->id)->with('season')->orderBy('name');

            $venues = $venues->get();

        } else {
            $venues = Venue::with('season')->orderBy('name')->get();
        }

        if (request()->expectsJson())
        {
            return $venues;
        }

        return view('properties.meets.venues.index', compact('venues'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }
}
