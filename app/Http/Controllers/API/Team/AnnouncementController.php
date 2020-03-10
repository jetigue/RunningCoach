<?php

namespace App\Http\Controllers\API\Team;

use App\Http\Controllers\Controller;
use App\Models\Team\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all()->sortByDesc('end_date');

        return $announcements;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement = request()->validate([
            'title'         => 'required|string',
            'body'          => 'required|string',
            'body_2'        => 'string|nullable',
            'body_3'        => 'string|nullable',
            'begin_date'    => 'required|date',
            'end_date'      => 'required|date',
            'link_1'        => 'active_url|nullable',
            'link_text_1'   => 'string|nullable',
            'link_2'        => 'active_url|nullable',
            'link_text_2'   => 'string|nullable',
            'link_3'        => 'active_url|nullable',
            'link_text_3'   => 'string|nullable',
        ]);

        $announcement = Announcement::create($announcement);

        return response()->json($announcement, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        request()->validate([
            'title'         => 'string',
            'body'          => 'string',
            'body_2'        => 'string|nullable',
            'body_3'        => 'string|nullable',
            'begin_date'    => 'date',
            'end_date'      => 'date',
            'link_1'        => 'active_url|nullable',
            'link_text_1'   => 'string|nullable',
            'link_2'        => 'active_url|nullable',
            'link_text_2'   => 'string|nullable',
            'link_3'        => 'active_url|nullable',
            'link_text_3'   => 'string|nullable',
        ]);

        $announcement->update(request([
            'title',
            'body',
            'body_2',
            'body_3',
            'begin_date',
            'end_date',
            'link_1',
            'link_text_1',
            'link_2',
            'link_text_2',
            'link_3',
            'link_text_3',
        ]));

        return response()->json($announcement, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return response()->json(null, 204);
    }
}
