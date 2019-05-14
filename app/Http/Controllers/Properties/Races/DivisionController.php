<?php

namespace App\Http\Controllers\Properties\Races;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\Races\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        if (request()->expectsJson()) {
            return $divisions;
        }

        return view('properties.races.divisions.index', compact('divisions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }
}
