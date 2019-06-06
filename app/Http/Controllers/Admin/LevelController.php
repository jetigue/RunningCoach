<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\Races\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();

        if (request()->expectsJson()) {
            return $levels;
        }

        return view('properties.races.levels.index', compact('levels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Level  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Level $division)
    {
        //
    }
}
