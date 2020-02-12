<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\Races\Track\Event;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TrackEventController extends Controller
{

    /**
     * TrackEventController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $events = Event::all();

        if (request()->expectsJson()) {
            return $events;
        }

        return view('properties.races.track.events.index', compact('events'));
    }
}
