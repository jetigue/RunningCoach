<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Models\Properties\Meets\Host;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostController extends Controller
{

    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Host[]|Collection
     */
    public function index()
    {
        return Host::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $host = request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $host = Host::create($host);

        return response()->json($host, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Host $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Host $host
     * @return JsonResponse
     */
    public function update(Request $request, Host $host)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $host->update(request(['name']));

        return response()->json($host, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Host $host
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Host $host)
    {
        $host->delete();

        return response()->json(null, 204);
    }
}
