<?php

namespace App\Http\Controllers;

use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Venue;
use Illuminate\Http\Request;

class CrossCountryVenueController extends Controller
{
    public function index()
    {
        $season = Season::where('slug', 'cross-country')->firstOrFail();

        $venues = Venue::where('season_id', $season->id)->orderBy('name', 'asc')->get();

        return view('venues.crossCountry.index', compact('venues'));
    }
}
