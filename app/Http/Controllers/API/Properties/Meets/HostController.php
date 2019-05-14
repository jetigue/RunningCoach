<?php

namespace App\Http\Controllers\API\Properties\Meets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\Host;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = Host::all();

        return $hosts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $host = request()->validate([
            'name' => 'required|string|min:3',
        ]);

        $host = Host::create($host);

        return response()->json($host, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Meets\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $host)
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);

        $host->update(request(['name']));

        return response()->json($host, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Meets\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        $host->delete();

        return response()->json(null, 204);
    }
}
