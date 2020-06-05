<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties\Races\Level;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
