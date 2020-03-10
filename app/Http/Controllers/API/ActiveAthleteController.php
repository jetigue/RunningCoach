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
            ->orderBy('last_name', 'asc')
            ->paginate(20);
    }
}
