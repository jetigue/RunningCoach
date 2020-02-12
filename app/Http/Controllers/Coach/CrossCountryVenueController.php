<?php

namespace App\Http\Controllers\Coach;

use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;
use App\Filters\VenueFilter;
use Illuminate\Http\Response;

class CrossCountryVenueController extends Controller
{

    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(VenueFilter $filters)
    {
        $venues = Venue::filter($filters)
            ->with('season')
            ->orderBy('name')
            ->get();

        if (request()->expectsJson())
        {
            return $venues;
        }

        return view('properties.meets.venues.crossCountry.index', compact('venues'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Venue  $venue
     * @return Response
     */
    public function show(Venue $venue)
    {
        //
    }
}
