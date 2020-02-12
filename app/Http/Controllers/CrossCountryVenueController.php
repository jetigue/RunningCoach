<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Venue;
use App\Models\Results\CrossCountry\Result;
use App\Repositories\CCVenueRecords;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CrossCountryVenueController extends Controller
{
    /**
     * List all of the cross country venues
     *
     * @return Factory|View
     */
    public function index()
    {
        $season = Season::where('slug', 'cross-country')->firstOrFail();

        $venues = Venue::where('season_id', $season->id)->orderBy('name', 'asc')->get();

        return view('venues.crossCountry.index', compact('venues'));
    }

    /**
     * Show the Boys Records for this Venue
     *
     * @param CCVenueRecords $venueRecords
     * @param Venue $venue
     * @return void
     */
    public function showBoysRecords(CCVenueRecords $venueRecords, Venue $venue)
    {
        $fastestBoys = $venueRecords->fastestBoys($venue);
        $fastestSeniorBoys = $venueRecords->fastestSeniorBoys($venue);
        $fastestJuniorBoys = $venueRecords->fastestJuniorBoys($venue);
        $fastestSophomoreBoys = $venueRecords->fastestSophomoreBoys($venue);
        $fastestFreshmenBoys = $venueRecords->fastestFreshmenBoys($venue);


        return view ('records.crossCountry.venues.boys.show', compact(
            'venue',
            'fastestBoys',
            'fastestSeniorBoys',
            'fastestJuniorBoys',
            'fastestSophomoreBoys',
            'fastestFreshmenBoys'
        ));
    }

    /**
     * @param Venue $venue
     * @param CCVenueRecords $venueRecords
     * @return Factory|View
     */
    public function showGirlsRecords(Venue $venue, CCVenueRecords $venueRecords)
    {
        $fastestGirls = $venueRecords->fastestGirls($venue);
        $fastestSeniorGirls = $venueRecords->fastestSeniorGirls($venue);
        $fastestJuniorGirls = $venueRecords->fastestJuniorGirls($venue);
        $fastestSophomoreGirls = $venueRecords->fastestSophomoreGirls($venue);
        $fastestFreshmenGirls = $venueRecords->fastestFreshmenGirls($venue);


        return view ('records.crossCountry.venues.girls.show', compact(
            'venue',
            'fastestGirls',
            'fastestSeniorGirls',
            'fastestJuniorGirls',
            'fastestSophomoreGirls',
            'fastestFreshmenGirls'
        ));
    }
}
