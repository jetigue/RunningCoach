<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Models\Properties\Meets\Timing;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('coach')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Timing[]|Collection
     */
    public function index()
    {
        return Timing::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timing = request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $timing = Timing::create($timing);

        return response()->json($timing, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function show(Timing $timing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timing $timing)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $timing->update(request(['name']));

        return response()->json($timing, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timing $timing)
    {
        $timing->delete();

        return response()->json(null, 204);
    }
}
