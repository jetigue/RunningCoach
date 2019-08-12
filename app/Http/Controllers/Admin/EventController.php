<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\Races\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class EventController extends Controller
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

        return view('properties.races.events.index', compact('events'));
    }
}
