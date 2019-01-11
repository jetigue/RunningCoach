<?php

namespace App\Http\Controllers\Properties\Races;

use App\Models\Properties\Races\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        if (request()->expectsJson()) {
            return $events;
        }

        return view('properties.races.events.index', compact('events'));
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
