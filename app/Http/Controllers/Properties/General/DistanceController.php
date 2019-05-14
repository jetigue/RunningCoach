<?php

namespace App\Http\Controllers\Properties\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Distance;

class DistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distances = Distance::all();

        if (request()->expectsJson()) {
            return $distances;
        }

        return view('properties.general.distances.index', compact('distances'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\General\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function show(Distance $distance)
    {
        //
    }
}
