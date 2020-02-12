<?php

namespace App\Http\Controllers\Coach;

use App\Models\Properties\General\TrackSurface;
use App\Models\Properties\Meets\Track\Venue;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TrackVenueController extends Controller
{

    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $venues = Venue::with('surface')->orderBy('name')->get();

        if (request()->expectsJson())
        {
            return $venues;
        }

        return view('properties.meets.venues.track.index', compact('venues'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }




}
