<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActiveAthleteController extends Controller
{
    public function index(Athlete $athletes)
    {

        return $athletes
            ->with('latestPhysical')
            ->where('status', 'a')
            ->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->with('trainingGroup')
            ->paginate(50);
    }
}
