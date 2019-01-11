<?php

namespace App\Http\Controllers\Properties\Races;

use App\Models\Properties\Races\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::all();

        if (request()->expectsJson()) {
            return $genders;
        }

        return view('properties.races.genders.index', compact('genders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        //
    }

}
