<?php

namespace App\Http\Controllers\Meets;

use App\Models\Meets\CrossCountryMeet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CrossCountryMeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $crossCountryMeets = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();

        return view('meets.crossCountry.index', compact('crossCountryMeets'));
    }

    /**
     * Display the specified resource.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @return Response
     */
    public function show(CrossCountryMeet $crossCountryMeet)
    {
        return view('meets.crossCountry.show', compact('crossCountryMeet'));
    }

}
