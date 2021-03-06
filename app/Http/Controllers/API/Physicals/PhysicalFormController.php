<?php

namespace App\Http\Controllers\API\Physicals;

use App\Http\Controllers\Controller;
use App\Models\Physical;
use Illuminate\Http\Request;
use PDF;

class PhysicalFormController extends Controller
{
    /**
     * PhysicalFormController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Physical $physical, Request $request)
    {
        request()->validate([
            'physical-form' => 'required|file|max:10000',
        ]);

        $physical->update([
            'form_path' => request()->file('physical-form')->store('physicals', 'public'),
        ]);

        return response([], 204);
    }
}
