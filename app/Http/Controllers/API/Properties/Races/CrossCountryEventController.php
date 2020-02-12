<?php

namespace App\Http\Controllers\API\Properties\Races;

use App\Models\Properties\Races\CrossCountry\Event;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CrossCountryEventController extends Controller
{

    /**
     * CrossCountryEventController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('coach')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Event[]|Collection
     */
    public function index()
    {
        $events = Event::all();

        return $events;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $event = request()->validate([
            'name' => 'required|string|min:2',
            'meters' => 'required|integer'
        ]);

        $event = Event::create($event);

        return response()->json($event, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return Response
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            'name' => 'required|min:2',
            'meters' => 'required|integer'
        ]);

        $event->update(request(['name', 'meters']));

        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     * @throws Exception
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
