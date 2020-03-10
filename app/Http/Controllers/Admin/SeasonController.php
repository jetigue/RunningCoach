<?php

namespace App\Http\Controllers\Admin;

use App\Filters\SeasonFilter;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     * @param \App\Filters\SeasonFilter $filters
     * @return \Illuminate\Http\Response
     */
    public function index(SeasonFilter $filters)
    {
        // $seasons = Season::all();

        $seasons = Season::filter($filters)->orderBy('name')->get();

        if (request()->expectsJson()) {
            return $seasons;
        }

        return view('properties.general.seasons.index', compact('seasons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }
}
