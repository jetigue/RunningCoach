<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\Group;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainingGroupController extends Controller
{

    /**
     * TrainingGroupController constructor.
     */
    public function __construct()
    {
        $this->middleware('coach')->except('index');

        $this->middleware('auth')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Group[]|Collection
     */
    public function index()
    {
        return Group::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $group = request()->validate([
            'name'  => 'required|string',
            'color' => 'required|size:6'
        ]);

        $group= Group::create($group);

        return response()->json($group, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Group $group
     * @return JsonResponse
     */
    public function update(Request $request, Group $group)
    {
        request()->validate([
            'name' => 'required|string',
            'color' => 'required|size:6'
        ]);

        $group->update(request([
            'name', 'color'
        ]));

        return response()->json($group, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
