<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties\Races\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

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
