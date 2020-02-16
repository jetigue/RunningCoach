<?php

namespace App\Http\Controllers\Coach;

use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CrossCountryVenueController extends Controller
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
        $venues = Venue::orderBy('name')->get();

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
