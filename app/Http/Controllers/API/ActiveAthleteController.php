<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Illuminate\Http\Request;

class ActiveAthleteController extends Controller
{
    public function index(Athlete $athletes)
    {
        return $athletes
            ->with('latestPhysical')
            ->where('status', 'a')
            ->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->with('trainingGroup')
            ->paginate(50);
    }
}
