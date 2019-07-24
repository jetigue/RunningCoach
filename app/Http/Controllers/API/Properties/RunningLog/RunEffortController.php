<?php

namespace App\Http\Controllers\API\Properties\RunningLog;

use App\Models\RunningLog\RunEffort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RunEffortController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runEfforts = RunEffort::all();

        return $runEfforts;
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
        $runEffort = request()->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
        ]);

        $runEffort = RunEffort::create($runEffort);

        return response()->json($runEffort, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Runninglog\RunEffort  $runEffort
     * @return \Illuminate\Http\Response
     */
    public function show(RunEffort $runEffort)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Runninglog\RunEffort  $runEffort
     * @return \Illuminate\Http\Response
     */
    public function edit(RunEffort $runEffort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Runninglog\RunEffort  $runEffort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunEffort $runEffort)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $runEffort->update(request(['name', 'description']));

        return response()->json($runEffort, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Runninglog\RunEffort  $runEffort
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunEffort $runEffort)
    {
        $runEffort->delete();

        return response()->json(null, 204);
    }
}
