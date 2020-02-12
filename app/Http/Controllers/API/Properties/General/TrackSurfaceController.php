<?php

namespace App\Http\Controllers\API\Properties\General;

use App\Models\Properties\General\TrackSurface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackSurfaceController extends Controller
{

    /**
     * GenderController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return TrackSurface[]|Collection
     */
    public function index()
    {
        return TrackSurface::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $trackSurface= request()->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $trackSurface = TrackSurface::create($trackSurface);

        return response()->json($trackSurface, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TrackSurface $trackSurface
     * @return \Illuminate\Http\Response
     */
    public function show(TrackSurface $trackSurface)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TrackSurface $trackSurface
     * @return JsonResponse
     */
    public function update(Request $request, TrackSurface $trackSurface)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $trackSurface->update(request(['name', 'description']));

        return response()->json($trackSurface, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TrackSurface $trackSurface
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TrackSurface $trackSurface)
    {
        $trackSurface->delete();

        return response()->json(null, 204);
    }
}
