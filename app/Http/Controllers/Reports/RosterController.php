<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Barryvdh\DomPDF\Facade as PDF;

class RosterController extends Controller
{
    public function activeRoster()
    {
        $athletes = Athlete::where('status', 'a')->orderby('last_name')->orderBy('first_name')->get();

        $pdf = PDF::loadView('reports.pdf.activeRoster', compact('athletes'));

        return $pdf->download('roster.pdf');
    }
}
