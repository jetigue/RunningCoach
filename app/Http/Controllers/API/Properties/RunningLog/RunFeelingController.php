<?php

namespace App\Http\Controllers\API\Properties\RunningLog;

use App\Models\RunningLog\RunFeeling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RunFeelingController extends Controller
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
        $runFeelings = RunFeeling::all();

        return $runFeelings;
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
        $runFeeling = request()->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
        ]);

        $runFeeling = RunFeeling::create($runFeeling);

        return response()->json($runFeeling, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Runninglog\RunFeeling  $runFeeling
     * @return \Illuminate\Http\Response
     */
    public function show(RunFeeling $runFeeling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Runninglog\RunFeeling  $runFeeling
     * @return \Illuminate\Http\Response
     */
    public function edit(RunFeeling $runFeeling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Runninglog\RunFeeling  $runFeeling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunFeeling $runFeeling)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $runFeeling->update(request(['name', 'description']));

        return response()->json($runFeeling, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Runninglog\RunFeeling  $runFeeling
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunFeeling $runFeeling)
    {
        $runFeeling->delete();

        return response()->json(null, 204);
    }
}
