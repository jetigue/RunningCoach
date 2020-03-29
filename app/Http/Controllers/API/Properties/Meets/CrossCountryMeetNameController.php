<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Filters\NameFilter;
use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\CrossCountry\Name;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CrossCountryMeetNameController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach')->except('index');
    }

    /**
     * @param NameFilter $filters
     * @return mixed
     */
    public function index(NameFilter $filters)
    {
        return Name::filter($filters)
            ->orderBy('name')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $meetName = request()->validate([
            'name' => 'required|string|min:3',
        ]);

        $meetName = Name::create($meetName);

        return response()->json($meetName, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Name $meetName
     * @return void
     */
    public function show(Name $meetName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Name $meetName
     * @return JsonResponse
     */
    public function update(Request $request, Name $meetName)
    {
        request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $meetName->update(request(['name']));

        return response()->json($meetName, 200);
    }

    /**
     * @param Name $meetName
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Name $meetName)
    {
        $meetName->delete();

        return response()->json(null, 204);
    }
}
