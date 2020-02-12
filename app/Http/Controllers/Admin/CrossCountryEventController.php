<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\Races\CrossCountry\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CrossCountryEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all();

        if (request()->expectsJson()) {
            return $events;
        }

        return view('properties.races.crossCountry.events.index', compact('events'));
    }
}
