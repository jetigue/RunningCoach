<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\RunningActivities\IntervalRun;
use App\Models\Training\RunningActivities\SteadyRun;
use App\Models\Training\Workout;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingCalendar2022Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index(Request $request)
    {
        $uri = $request->path();

        switch ($uri) {
            case 'training-calendar/May/2022':
                $calendar = Calendar::whereMonth('calendar_date', 5)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/June/2022':
                $calendar = Calendar::whereMonth('calendar_date', 6)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/July/2022':
                $calendar = Calendar::whereMonth('calendar_date', 7)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/August/2022':
                $calendar = Calendar::whereMonth('calendar_date', 8)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/September/2022':
                $calendar = Calendar::whereMonth('calendar_date', 9)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/October/2022':
                $calendar = Calendar::whereMonth('calendar_date', 10)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/November/2022':
                $calendar = Calendar::whereMonth('calendar_date', 11)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/December/2022':
                $calendar = Calendar::whereMonth('calendar_date', 12)
                    ->whereYear('calendar_date', 2022)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/January/2023':
                $calendar = Calendar::whereMonth('calendar_date', 1)
                    ->whereYear('calendar_date', 2023)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/February/2023':
                $calendar = Calendar::whereMonth('calendar_date', 2)
                    ->whereYear('calendar_date', 2023)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/March/2023':
                $calendar = Calendar::whereMonth('calendar_date', 3)
                    ->whereYear('calendar_date', 2023)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/April/2023':
                $calendar = Calendar::whereMonth('calendar_date', 4)
                    ->whereYear('calendar_date', 2023)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            case 'training-calendar/May/2023':
                $calendar = Calendar::whereMonth('calendar_date', 5)
                    ->whereYear('calendar_date', 2023)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
                break;
            default:
                $date = getDate();
                $month = $date['mon'];

                $calendar = Calendar::whereMonth('calendar_date', $month)
                    ->whereYear('calendar_date', 2023)
                    ->with(['workouts' => function ($q) {
                        $q->orderBy('training_group_id');
                    }])
                    ->orderBy('calendar_date')->get();
        }

        return view('training.calendar.index', compact('calendar'));
    }

    /**
     * @param Calendar $calendar
     * @return Application|Factory|View
     */
    public function show(Calendar $calendar)
    {
        $primarySteadyRuns = SteadyRun::where('training_date', $calendar->calendar_date)
            ->whereNotIn('steady_run_type_id', [1, 2])
            ->where('workout', 'primary')
            ->get();

        $primaryWarmUp = SteadyRun::where('training_date', $calendar->calendar_date)
            ->where('steady_run_type_id', 1)
            ->where('workout', 'primary')
            ->get();

        $primaryCoolDown = SteadyRun::where('training_date', $calendar->calendar_date)
            ->where('steady_run_type_id', 2)
            ->where('workout', 'primary')
            ->get();

        $primaryIntervalRuns = IntervalRun::where('training_date', $calendar->calendar_date)
            ->where('workout', 'primary')
            ->get();

        $secondarySteadyRuns = SteadyRun::where('training_date', $calendar->calendar_date)
            ->whereNotIn('steady_run_type_id', [1, 2])
            ->where('workout', 'secondary')
            ->get();

        $secondaryWarmUp = SteadyRun::where('training_date', $calendar->calendar_date)
            ->where('steady_run_type_id', 1)
            ->where('workout', 'secondary')
            ->get();

        $secondaryCoolDown = SteadyRun::where('training_date', $calendar->calendar_date)
            ->where('steady_run_type_id', 2)
            ->where('workout', 'secondary')
            ->get();

        $secondaryIntervalRuns = IntervalRun::where('training_date', $calendar->calendar_date)
            ->where('workout', 'secondary')
            ->get();

        $workouts = Workout::where('workout_date', $calendar->calendar_date)
            ->orderBy('training_group_id')
            ->get();

        return view('training.calendar.show', compact(
            'calendar',
            'primaryCoolDown',
            'primaryIntervalRuns',
            'primarySteadyRuns',
            'primaryWarmUp',
            'secondaryCoolDown',
            'secondaryIntervalRuns',
            'secondarySteadyRuns',
            'secondaryWarmUp',
            'workouts'

        ));
    }
}
