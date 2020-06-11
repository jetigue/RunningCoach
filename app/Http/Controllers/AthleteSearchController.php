<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;

class AthleteSearchController extends Controller
{
    public function show()
    {
        $search = request('q');

        $athletes = Athlete::search($search)->paginate(25);

        if (request()->expectsJson()) {
            return $athletes;
        }

        return view('athletes.search.index', compact('athletes'));
    }
}

