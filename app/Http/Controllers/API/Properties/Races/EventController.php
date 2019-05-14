<?php

namespace App\Http\Controllers\API\Properties\Races;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\Races\Event;

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

        return $events;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = request()->validate([
            'name' => 'required|string|min:3',
            'meters' => 'required|integer',
        ]);

        $event = Event::create($event);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Races\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            'name' => 'required|min:3',
            'meters' => 'required|integer',
        ]);

        $event->update(request(['name', 'meters']));

        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Races\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
