<?php

namespace App\Http\Controllers\Track;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Meets\TrackMeet;
use App\Models\Properties\Races\Track\Event;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
use App\Repositories\TrackSeasonBests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeasonBestController extends Controller
{
    public function index(TrackSeasonBests $seasonBests)
    {
        $results800m = $seasonBests->trackResults()->where('track_events.meters', 800)->get();
        $results1200m = $seasonBests->trackResults()->where('track_events.meters', 1200)->get();
        $results1500m = $seasonBests->trackResults()->where('track_events.meters', 1500)->get();
        $results1600m = $seasonBests->trackResults()->where('track_events.meters', 1600)->get();
        $results3200m = $seasonBests->trackResults()->where('track_events.meters', 3200)->get();

        $seasonBestMale800 = $seasonBests->fastestMale800m2020();
        $seasonBestFemale800 = $seasonBests->fastestFemale800m2020();
        $seasonBestMale1200 = $seasonBests->fastestMale1200m2020();
        $seasonBestFemale1200 = $seasonBests->fastestFemale1200m2020();
        $seasonBestMale1500 = $seasonBests->fastestMale1500m2020();
        $seasonBestFemale1500 = $seasonBests->fastestFemale1500m2020();
        $seasonBestMale1600 = $seasonBests->fastestMale1600m2020();
        $seasonBestFemale1600 = $seasonBests->fastestFemale1600m2020();
        $seasonBestMale3200 = $seasonBests->fastestMale3200m2020();
        $seasonBestFemale3200 = $seasonBests->fastestFemale3200m2020();

        return view('records.track.seasonBests.index', compact(
            'results800m',
            'results1200m',
            'results1500m',
            'results1600m',
            'results3200m',
            'seasonBestMale800',
            'seasonBestFemale800',
            'seasonBestMale1200',
            'seasonBestFemale1200',
            'seasonBestMale1500',
            'seasonBestFemale1500',
            'seasonBestMale1600',
            'seasonBestFemale1600',
            'seasonBestMale3200',
            'seasonBestFemale3200'
        ));
    }

    public function best800m(TrackSeasonBests $seasonBest)
    {
        $femaleAthleteSeasonBest = $seasonBest->femaleAthletesBest800m2020();
        $maleAthleteSeasonBest = $seasonBest->maleAthletesBest800m2020();
//        $maleAthleteSeasonBest = $seasonBest->athleteSeasonBest2020();
//dd($maleAthleteSeasonBest->toArray());
        return view('records.track.seasonBests.show', compact(
            'maleAthleteSeasonBest', 'femaleAthleteSeasonBest'
        ));
    }

    public function best1200m(TrackSeasonBests $seasonBest)
    {
        $femaleAthleteSeasonBest= $seasonBest->femaleAthletesBest1200m2020();
        $maleAthleteSeasonBest = $seasonBest->maleAthletesBest1200m2020();

        return view('records.track.seasonBests.show', compact(
            'maleAthleteSeasonBest', 'femaleAthleteSeasonBest'
        ));
    }

    public function best1500m(TrackSeasonBests $seasonBest)
    {
        $femaleAthleteSeasonBest = $seasonBest->femaleAthletesBest1500m2020();
        $maleAthleteSeasonBest = $seasonBest->maleAthletesBest1500m2020();

        return view('records.track.seasonBests.show', compact(
            'maleAthleteSeasonBest', 'femaleAthleteSeasonBest'
        ));
    }

    public function best1600m(TrackSeasonBests $seasonBest)
    {
        $femaleAthleteSeasonBest = $seasonBest->femaleAthletesBest1600m2020();
        $maleAthleteSeasonBest = $seasonBest->maleAthletesBest1600m2020();

        return view('records.track.seasonBests.show', compact(
            'maleAthleteSeasonBest', 'femaleAthleteSeasonBest'
        ));
    }

    public function best3200m(TrackSeasonBests $seasonBest)
    {
        $femaleAthleteSeasonBest= $seasonBest->femaleAthletesBest3200m2020();
        $maleAthleteSeasonBest = $seasonBest->maleAthletesBest3200m2020();

        return view('records.track.seasonBests.show', compact(
            'maleAthleteSeasonBest', 'femaleAthleteSeasonBest'
        ));
    }
}
