<?php

Auth::routes();

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/coaches', 'PageController@coaches');
Route::get('/boys-roster', 'PageController@boysRoster');
Route::get('/girls-roster', 'PageController@girlsRoster');
Route::get('/booster-club', 'PageController@boosterClub');
Route::get('/sponsors', 'PageController@sponsors');
Route::get('/team-camp', 'PageController@teamCamp');
Route::get('/longhorn-5k', 'PageController@longhorn5k');
Route::get('/river-run', 'PageController@riverRun');

Route::get('/training-pace-calculator', function () {
    return view('training.paceCalculator.show');
});

Route::get('/cross-country/meets', 'Meets\CrossCountryMeetController@index');
Route::get('/cross-country/meets/{crossCountryMeet:slug}', 'Meets\CrossCountryMeetController@show');
Route::get(
    '/cross-country/meets/{crossCountryMeet:slug}/team-results/{teamResult}',
    'Results\CrossCountry\TeamResultController@show'
);

Route::get('/track/meets', 'Meets\TrackMeetController@index');
Route::get('/track/meets/{trackMeet:slug}', 'Meets\TrackMeetController@show');
Route::get(
    '/track/meets/{trackMeet:slug}/team-results/{teamResult:slug}',
    'Results\Track\TeamResultController@show'
);

Route::get('/cross-country-/venues', 'CrossCountryVenueController@index');

Route::get('track/season-bests', 'Track\SeasonBestController@index');
Route::get('track/season-bests/athletes-season-bests/800m', 'Track\SeasonBestController@best800m');
Route::get('track/season-bests/athletes-season-bests/1200m', 'Track\SeasonBestController@best1200m');
Route::get('track/season-bests/athletes-season-bests/1500m', 'Track\SeasonBestController@best1500m');
Route::get('track/season-bests/athletes-season-bests/1600m', 'Track\SeasonBestController@best1600m');
Route::get('track/season-bests/athletes-season-bests/3200m', 'Track\SeasonBestController@best3200m');

Route::get('/cross-country/venues/{venue}/boys-records', 'CrossCountryVenueController@showBoysRecords');
Route::get('/cross-country/venues/{venue}/girls-records', 'CrossCountryVenueController@showGirlsRecords');

Route::get('/athletes/{athlete}', 'AthleteProfileController@show');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/track/time-trials', 'TimeTrials\TrackTimeTrialController');

Route::get('training-calendar/{calendar:month_name}/2020', 'Training\TrainingCalendar2020Controller@index');
Route::get('training-calendar/{calendar:month_name}/2021', 'Training\TrainingCalendar2020Controller@index');
Route::get('training-calendar/{calendar:month_name}/2022', 'Training\TrainingCalendar2022Controller@index');
Route::get('training-calendar/{calendar:calendar_date}', 'Training\TrainingCalendar2020Controller@show');
Route::get('training-calendar', 'Training\TrainingCalendar2022Controller@index');

//Time Trials
Route::get('/cross-country/time-trials', 'TimeTrials\CrossCountryTimeTrialController@index');
Route::get('/cross-country/time-trials/{timeTrial}', 'TimeTrials\CrossCountryTimeTrialController@show');

Route::get('/cross-country/time-trials/{timeTrial}/races/{race}', 'TimeTrials\CrossCountryTimeTrialRaceController@show');
Route::get('/track/time-trials', 'TimeTrials\TrackTimeTrialController@index');
Route::get('/track/time-trials/{timeTrial}/races/{race}', 'TimeTrials\TrackTimeTrialRaceController@show');

//Cross Country Meets
Route::get('api/cross-country/meets', 'API\Meets\CrossCountryMeetController@index');
Route::post('api/cross-country/meets', 'API\Meets\CrossCountryMeetController@store');
Route::patch('api/cross-country/meets/{crossCountryMeet}', 'API\Meets\CrossCountryMeetController@update');
Route::delete('api/cross-country/meets/{crossCountryMeet}', 'API\Meets\CrossCountryMeetController@destroy');

// Track Meets
Route::get('api/track/meets', 'API\Meets\TrackMeetController@index');
Route::post('api/track/meets', 'API\Meets\TrackMeetController@store');
Route::patch('api/track/meets/{trackMeet}', 'API\Meets\TrackMeetController@update');
Route::delete('api/track/meets/{trackMeet}', 'API\Meets\TrackMeetController@destroy');

// Physicals
Route::get('api/physicals-athletes',  'API\Physicals\AthletePhysicalController@index');

// Training

Route::get('api/athletes/{athlete}/track-training-paces', 'API\Training\TrackTrainingPaceController@show');
Route::get('api/athletes/{athlete}/track-tt-training-paces', 'API\Training\TrackTrialTrainingPaceController@show');
Route::get('api/athletes/{athlete}/xc-training-paces', 'API\Training\XCTrainingPaceController@show');
Route::get('api/athletes/{athlete}/xc-tt-training-paces', 'API\Training\XCTrialTrainingPaceController@show');


Route::get('api/interval-run-types', 'API\Training\IntervalRunTypeController@index');
Route::post('api/interval-run-types', 'API\Training\IntervalRunTypeController@store');
Route::patch('api/interval-run-types/{interval}', 'API\Training\IntervalRunTypeController@update');
Route::delete('api/interval-run-types/{interval}', 'API\Training\IntervalRunTypeController@destroy');

Route::get('api/steady-run-types', 'API\Training\SteadyRunTypeController@index');
Route::post('api/steady-run-types', 'API\Training\SteadyRunTypeController@store');
Route::patch('api/steady-run-types/{steady}', 'API\Training\SteadyRunTypeController@update');
Route::delete('api/steady-run-types/{steady}', 'API\Training\SteadyRunTypeController@destroy');

Route::get('api/training-intensities', 'API\Training\TrainingIntensityController@index');
Route::post('api/training-intensities', 'API\Training\TrainingIntensityController@store');
Route::patch('api/training-intensities/{intensity}', 'API\Training\TrainingIntensityController@update');
Route::delete('api/training-intensities/{intensity}', 'API\Training\TrainingIntensityController@destroy');

Route::get('api/training-periods', 'API\Training\TrainingPeriodController@index');
Route::post('api/training-periods', 'API\Training\TrainingPeriodController@store');
Route::patch('api/training-periods/{trainingPeriod}', 'API\Training\TrainingPeriodController@update');
Route::delete('api/training-periods/{trainingPeriod}', 'API\Training\TrainingPeriodController@destroy');

Route::get('api/training-phases', 'API\Training\TrainingPhaseController@index');
Route::post('api/training-phases', 'API\Training\TrainingPhaseController@store');
Route::patch('api/training-phases/{trainingPhase}', 'API\Training\TrainingPhaseController@update');
Route::delete('api/training-phases/{trainingPhase}', 'API\Training\TrainingPhaseController@destroy');

Route::get('api/training-days', 'API\Training\TrainingDayController@index');
Route::post('api/training-days', 'API\Training\TrainingDayController@store');
Route::patch('api/training-days/{trainingDay}', 'API\Training\TrainingDayController@update');
Route::delete('api/training-days/{trainingDay}', 'API\Training\TrainingDayController@destroy');

Route::get('api/training-groups', 'API\Training\TrainingGroupController@index');
Route::post('api/training-groups', 'API\Training\TrainingGroupController@store');
Route::patch('api/training-groups/{group}', 'API\Training\TrainingGroupController@update');
Route::delete('api/training-groups/{group}', 'API\Training\TrainingGroupController@destroy');

Route::get('api/training-calendar/{calendar:calendar_date}/steady-runs', 'API\Training\SteadyRunController@index');
Route::post('api/training-calendar/{calendar:calendar_date}/steady-runs', 'API\Training\SteadyRunController@store');
Route::patch(
    'api/training-calendar/{calendar:calendar_date}/steady-runs/{steadyRun}',
    'API\Training\SteadyRunController@update'
);
Route::delete(
    'api/training-calendar/{calendar:calendar_date}/steady-runs/{steadyRun}',
    'API\Training\SteadyRunController@destroy'
);

Route::get('api/training-calendar/{calendar:calendar_date}/interval-runs', 'API\Training\IntervalRunController@index');
Route::post('api/training-calendar/{calendar:calendar_date}/interval-runs', 'API\Training\IntervalRunController@store');
Route::patch(
    'api/training-calendar/{calendar:calendar_date}/interval-runs/{intervalRun}',
    'API\Training\IntervalRunController@update'
);
Route::delete(
    'api/training-calendar/{calendar:calendar_date}/interval-runs/{intervalRun}',
    'API\Training\IntervalRunController@destroy'
);

Route::get('api/training-calendar/steady-runs', 'API\Training\TrainingDayController@steadyRuns');
Route::get('api/training-calendar/interval-runs', 'API\Training\TrainingDayController@intervalRuns');

// Workout Cards
Route::get('api/training-calendar/{calendar:calendar_date}/warm-ups', 'API\Training\WorkoutCardController@warmUps');
Route::get('api/training-calendar/{calendar:calendar_date}/steady-runs', 'API\Training\WorkoutCardController@steadyRuns');
Route::get('api/training-calendar/{calendar:calendar_date}/interval-runs', 'API\Training\WorkoutCardController@intervalRuns');
Route::get('api/training-calendar/{calendar:calendar_date}/cool-downs', 'API\Training\WorkoutCardController@coolDowns');

// Workouts
Route::get('api/training-calendar/{calendar:calendar_date}/workouts', 'API\Training\TrainingCalendarWorkoutController@index');
Route::post('api/training-calendar/{calendar:calendar_date}/workouts', 'API\Training\TrainingCalendarWorkoutController@store');
Route::patch('api/training-calendar/{calendar:calendar_date}/workouts/{workout}', 'API\Training\TrainingCalendarWorkoutController@update');
Route::delete('api/training-calendar/{calendar:calendar_date}/workouts/{workout}', 'API\Training\TrainingCalendarWorkoutController@destroy');

// VDOT Values
Route::get('api/athlete-vdot/latest', 'API\Training\AthleteVDOTController@show');
Route::get('api/training-group-vdot/average', 'API\Training\TrainingGroupVDOTController@average');

Route::get('api/training-groups/rosters', 'API\Training\TrainingGroupRosterController@index');

Route::apiResources([
    'api/athletes' => 'API\AthleteController',
    'api/active-athletes' => 'API\ActiveAthleteController',
    'api/training-groups/athletes' => 'API\Athletes\AthleteTrainingGroupController',

    'api/physicals' => 'API\Physicals\PhysicalController',
    'api/physicals/{physical}/physical-form' => 'API\Physicals\PhysicalFormController',

    'api/running-log' => 'API\RunningLog\RunningLogController',
    'api/team-log' => 'API\RunningLog\TeamLogController',
    'api/summer-running' => 'API\RunningLog\SummerRunningController',


    // TeamResults
    'api/cross-country/meets/{crossCountryMeet:slug}/team-results' => 'API\Results\CrossCountry\TeamResultController',
    'api/track/meets/{trackMeet:slug}/team-results' => 'API\Results\Track\TeamResultController',

    // Race Results
    'api/cross-country/meets/{crossCountryMeet:slug}/team-results/{teamResult:id}/results' => 'API\Results\CrossCountry\ResultController',
    'api/track/meets/{trackMeet:slug}/team-results/{teamResult:slug}/results' => 'API\Results\Track\ResultController',

    // General Properties
    'api/day-times'          => 'API\Properties\General\DayTimeController',
    'api/distances'         => 'API\Properties\General\DistanceController',
    'api/seasons'           => 'API\Properties\General\SeasonController',
    'api/terrain-types'      => 'API\Properties\General\TerrainTypeController',
    'api/track-surfaces'     => 'API\Properties\General\TrackSurfaceController',

    // Meet Properties
    'api/hosts'                 => 'API\Properties\Meets\HostController',
    'api/track/meet-names'             => 'API\Properties\Meets\TrackMeetNameController',
    'api/cross-country/meet-names'             => 'API\Properties\Meets\CrossCountryMeetNameController',
    'api/timing'                => 'API\Properties\Meets\TimingController',
    'api/cross-country/venues'   => 'API\Properties\Meets\CrossCountryVenueController',
    'api/track/venues'          => 'API\Properties\Meets\TrackVenueController',

    // Race Properties
    'api/levels'                    => 'API\Properties\Races\LevelController',
    'api/cross-country/events'      => 'API\Properties\Races\CrossCountryEventController',
    'api/genders'                   => 'API\Properties\Races\GenderController',
    'api/divisions'                 => 'API\Properties\Races\DivisionController',
    'api/titles'                    => 'API\Properties\Races\TitleController',
    'api/track/events'              => 'API\Properties\Races\TrackEventController',

    // Running Log Properties
    'api/run-efforts' => 'API\Properties\RunningLog\RunEffortController',
    'api/run-feelings' => 'API\Properties\RunningLog\RunFeelingController',
    'api/run-types' => 'API\Properties\RunningLog\RunTypeController',

    // Time Trials
    'api/cross-country/time-trials' => 'API\TimeTrials\CrossCountryTimeTrialController',
    'api/cross-country/time-trials/{timeTrial}/races' => 'API\TimeTrials\CrossCountryTimeTrialRaceController',
    'api/cross-country/time-trials/{timeTrial}/races/{race}/results' => 'API\TimeTrials\CrossCountryTimeTrialRaceResultController',
    'api/track/time-trials' => 'API\TimeTrials\TrackTimeTrialController',
    'api/track/time-trials/{timeTrial}/races' => 'API\TimeTrials\TrackTimeTrialRaceController',
    'api/track/time-trials/{timeTrial}/races/{race}/results' => 'API\TimeTrials\TrackTimeTrialRaceResultController',

    // users
    'api/user-roles'  => 'API\Users\RoleController',
    'api/users'  => 'API\Users\UserController',

    // Team Administration
    'api/announcements' => 'API\Team\AnnouncementController',
    'api/team-events' => 'API\Team\TeamEventController',
]);

Route::group(['middleware' => 'admin'], function () {
    Route::get('cross-country/events', 'Admin\CrossCountryEventController@index');
    Route::get('day-times', 'Admin\DayTimeController@index');
    Route::get('distances', 'Admin\DistanceController@index');
    Route::get('divisions', 'Coach\DivisionController@index');
    Route::get('genders', 'Admin\GenderController@index');
    Route::get('levels', 'Admin\LevelController@index');
    Route::get('race-titles', 'Admin\TitleController@index');
    Route::get('run-efforts', 'Admin\RunEffortController@index');
    Route::get('run-feelings', 'Admin\RunFeelingController@index');
    Route::get('run-types', 'Admin\RunTypeController@index');
    Route::get('seasons', 'Admin\SeasonController@index');
    Route::get('terrain-types', 'Admin\TerrainTypeController@index');
    Route::get('timing', 'Admin\TimingController@index');
    Route::get('track-surfaces', 'Admin\TrackSurfaceController@index');
    Route::get('track/events', 'Admin\TrackEventController@index');
    Route::get('training-intensities', 'Admin\TrainingIntensityController@index');
    Route::get('training-periods', 'Admin\TrainingPeriodController@index');
    Route::get('training-phases', 'Admin\TrainingPhaseController@index');
    Route::get('training/interval-run-types', 'Admin\Training\IntervalRunTypeController@index');
    Route::get('training/steady-run-types', 'Admin\Training\SteadyRunTypeController@index');
    Route::get('user-roles', 'Admin\UserRoleController@index');
    Route::get('users', 'Admin\UserController@index');
});

Route::group(['middleware' => 'coach'], function () {
    Route::get('active-athletes', 'Coach\AthleteController@index');
    Route::get('announcements', 'Coach\AnnouncementController@index');
    Route::get('athletes', 'Coach\AthleteController@index');
    Route::get('cross-country/meet-names', 'Coach\CrossCountryMeetNameController@index');
    Route::get('cross-country/venues', 'Coach\CrossCountryVenueController@index');
    Route::get('divisions', 'Coach\DivisionController@index');
    Route::get('hosts', 'Coach\HostController@index');
    Route::get('physicals', 'Coach\PhysicalController@index');
    Route::get('physicals/{physical}', 'Coach\PhysicalController@show');
    Route::get('team-events', 'Coach\TeamEventController@index');
    Route::get('track/meet-names', 'Coach\TrackMeetNameController@index');
    Route::get('track/venues', 'Coach\TrackVenueController@index');
    Route::get('training-groups', 'Training\TrainingGroupController@index');
    Route::get('training-groups/athletes', 'Training\TrainingGroupAthleteController@index');
    Route::get('/reports', function () {
        return view('reports.index');
    });
});

Route::group(['middleware' => 'user'], function () {
    Route::get('team-log', 'User\TeamLogController@index');
    Route::get('summer-running', 'User\SummerRunningController@index');
});

Route::resource('/running-log', 'User\RunningLogController');

//Reports
Route::get('/reports/active-roster', 'Reports\RosterController@activeRoster')->name('activeRoster');
