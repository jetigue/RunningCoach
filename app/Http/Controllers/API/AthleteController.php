<?php

namespace App\Http\Controllers\API;

use App\Filters\AthleteFilter;
use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            ->with('trainingGroup')
            ->paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
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
            'training_group_id' => 'nullable|integer'
        ]);

        $athlete = Athlete::create($athlete);

        return response()->json($athlete, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Athlete $athlete
     * @return JsonResponse
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
            'training_group_id' => 'nullable|integer'
        ]);

        $athlete->update(request([
            'first_name',
            'last_name',
            'sex',
            'dob',
            'grad_year',
            'status',
            'user_id',
            'training_group_id'
        ]));

        return response()->json($athlete, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Athlete $athlete
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        return response()->json(null, 204);
    }
}
