<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\CrossCountry\Name;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CrossCountryMeetNameController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        $meetNames = Name::orderBy('name')->get();

        return view('properties.meets.names.crossCountry.index', compact('meetNames'));
    }

    /**
     * Display the specified resource.
     *
     * @param Name $name
     * @return void
     */
    public function show(Name $name)
    {
        //
    }
}
