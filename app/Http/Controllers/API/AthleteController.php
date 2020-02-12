<?php

namespace App\Http\Controllers\API;

use App\Filters\AthleteFilter;
use App\Mail\AthleteAdded;
use App\Models\Athlete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AthleteController extends Controller
{

    /**
     * AthleteController constructor.
     */
    public function __construct()
    {
        $this->middleware('coach');
    }


    /**
     * @param Athlete $athletes
     * @param AthleteFilter $filters
     * @return mixed
     */
    public function index(Athlete $athletes)
    {
        return $athletes
            ->with('latestPhysical')
            ->orderBy('last_name', 'asc')
            ->paginate(50);

        $allAthletes = Athlete::orderBy('last_name', 'asc');

        return $athletes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete = request()->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'sex'        => 'required',
            'dob'        => 'nullable|date',
            'grad_year'  => 'required|integer',
            'status'     => 'required',
            'user_id'    => 'nullable|integer',
        ]);

        $athlete = Athlete::create($athlete);

        return response()->json($athlete, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        request()->validate([
            'first_name'    => 'string',
            'last_name'     => 'string',
            'sex'           => '',
            'dob'           => 'nullable|date',
            'grad_year'     => 'integer',
            'status'        => '',
            'user_id'       => 'nullable|integer',
        ]);

        $athlete->update(request([
            'first_name',
            'last_name',
            'sex',
            'dob',
            'grad_year',
            'status',
            'user_id',
        ]));

        return response()->json($athlete, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        return response()->json(null, 204);
    }
}
