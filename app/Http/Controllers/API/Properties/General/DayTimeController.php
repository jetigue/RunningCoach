<?php

namespace App\Http\Controllers\API\Properties\General;

use App\Models\Properties\General\DayTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DayTimeController extends Controller
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
     * @return DayTime[]|Collection
     */
    public function index()
    {
        return DayTime::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dayTime = request()->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $dayTime = DayTime::create($dayTime);

        return response()->json($dayTime, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function show(DayTime $dayTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DayTime $dayTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DayTime $dayTime)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $dayTime->update(request(['name', 'description']));

        return response()->json($dayTime, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DayTime $dayTime)
    {
        $dayTime->delete();

        return response()->json(null, 204);
    }
}
