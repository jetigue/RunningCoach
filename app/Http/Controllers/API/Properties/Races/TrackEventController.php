<?php

namespace App\Http\Controllers\API\Properties\Races;

use App\Models\Properties\Races\Track\Event;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TrackEventController extends Controller
{

    /**
     * TrackEventController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('coach')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
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
            'meters' => 'required|integer',
            'relay' => 'required|boolean'
        ]);

        $event = Event::create($event);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\TrackEvent  $trackEvent
     * @return Response
     */
    public function show(TrackEvent $trackEvent)
    {
        //
    }


    /**
     * @param Request $request
     * @param Event $event
     * @return JsonResponse
     */
    public function update(Request $request, Event $event)
    {
        request()->validate([
            'name' => 'required|min:2',
            'meters' => 'required|integer',
            'relay' => 'required|boolean'
        ]);

        $event->update(request(['name', 'meters', 'relay']));

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
