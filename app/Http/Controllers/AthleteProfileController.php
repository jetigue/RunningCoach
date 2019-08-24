<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AthleteProfileController extends Controller
{
    public function show(Athlete $athlete)
    {

        $results = CrossCountryMeet::whereHas('results', function ($query) use ($athlete) {
             $query->where('athlete_id', $athlete->id);
        })
            ->orderBy('meet_date', 'desc')
            ->with('name', 'results', 'teamResults', 'teamResults.event', 'teamResults.division.level')
            ->get();

        return view('profiles.athletes.show', compact('athlete', 'results'));
    }
}
