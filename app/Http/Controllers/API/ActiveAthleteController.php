<?php

namespace App\Http\Controllers\API;

use App\Models\Athlete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveAthleteController extends Controller
{
    public function index(Athlete $athletes)
    {
        return $athletes
            ->with('latestPhysical')
            ->where('status', 'a')
            ->orderBy('last_name', 'asc')
            ->paginate(20);
    }
}
