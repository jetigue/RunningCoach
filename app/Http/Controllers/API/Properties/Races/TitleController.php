<?php

namespace App\Http\Controllers\API\Properties\Races;

use App\Models\Properties\Races\Title;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TitleController extends Controller
{
    /**
     * TitleController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');
        $this->middleware('coach')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $titles = Title::orderBy('name', 'asc')->get();

        return $titles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $title = request()->validate([
            'name' => 'string|min:3'
        ]);

        $title = Title::create($title);

        return response()->json($title, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Title $title
     * @return Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Title $title
     * @return Response
     */
    public function update(Request $request, Title $title)
    {
        request()->validate([
            'name' => 'string|min:3'
        ]);

        $title->update(request(['name']));

        return response()->json($title, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Title $title
     * @return Response
     * @throws \Exception
     */
    public function destroy(Title $title)
    {
        $title->delete();

        return response()->json(null, 204);
    }
}
