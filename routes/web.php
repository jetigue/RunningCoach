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

Route::get('/cross-country/meets', 'Meets\CrossCountryMeetController@index');
Route::get('/cross-country/meets/{crossCountryMeet}', 'Meets\CrossCountryMeetController@show');
Route::get('/cross-country/meets/{crossCountryMeet}/team-results/{teamResult}',
    'Results\CrossCountry\TeamResultController@show');

Route::get('/track/meets', 'Meets\TrackMeetController@index');
Route::get('/track/meets/{trackMeet}', 'Meets\TrackMeetController@show');
Route::get('/track/meets/{trackMeet}/team-results/{teamResult}', 'Results\Track\TeamResultController@show');

Route::get('/cross-country-/venues', 'CrossCountryVenueController@index');

Route::get('track/season-bests', 'Track\SeasonBestController@index');
Route::get('track/season-bests/athletes-season-bests', 'Track\SeasonBestController@show');

Route::get('/cross-country/venues/{venue}/boys-records', 'CrossCountryVenueController@showBoysRecords');
Route::get('/cross-country/venues/{venue}/girls-records', 'CrossCountryVenueController@showGirlsRecords');

Route::get('/athletes/{athlete}', 'AthleteProfileController@show');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/track/time-trials', 'TimeTrials\TrackTimeTrialController');

Route::get('/track/time-trials/{timeTrial}/races/{race}', 'TimeTrials\TrackTimeTrialRaceController@show');

// Route::post('track-meets/{trackMeet}/team-results', 'API\Results\TimeTrial\TeamResultController@store');
// Route::patch('track-meets/{trackMeet}/team-results/{teamResult}', 'API\Results\TimeTrial\TeamResultController@update');

//Route::resource('track/meets/{trackMeet}/team-results/{teamResult}/results', 'API\Results\Track\ResultController');

//Route::resource('cross-country/meets/{crossCountryMeet}/team-results', 'API\Results\CrossCountry\TeamResultController');
//Route::resource('cross-country/meets/{crossCountryMeet}/team-results/{teamResult}/results',
//    'API\Results\CrossCountry\ResultController');

Route::apiResources([

    'api/athletes' => 'API\AthleteController',
    'api/active-athletes' => 'API\ActiveAthleteController',

    'api/physicals' => 'API\Physicals\PhysicalController',
    'api/physicals-athletes' => 'API\Physicals\AthletePhysicalController',
    'api/physicals/{physical}/physical-form' =>'API\Physicals\PhysicalFormController',

    'api/running-log' => 'API\RunningLog\RunningLogController',
    'api/team-log' => 'API\RunningLog\TeamLogController',
    'api/summer-running' => 'API\RunningLog\SummerRunningController',

    // Meets
    'api/track/meets' => 'API\Meets\TrackMeetController',
    'api/cross-country/meets' => 'API\Meets\CrossCountryMeetController',

    // TeamResults
    'api/cross-country/meets/{crossCountryMeet}/team-results' => 'API\Results\CrossCountry\TeamResultController',
    'api/track/meets/{trackMeet}/team-results' => 'API\Results\Track\TeamResultController',

    // Race Results
    'api/cross-country/meets/{crossCountryMeet}/team-results/{teamResult}/results' => 'API\Results\CrossCountry\ResultController',
    'api/track/meets/{trackMeet}/team-results/{teamResult}/results' => 'API\Results\Track\ResultController',

    // General Properties
    'api/day-times'          => 'API\Properties\General\DayTimeController',
    'api/distances'         => 'API\Properties\General\DistanceController',
    'api/seasons'           => 'API\Properties\General\SeasonController',
    'api/terrain-types'      => 'API\Properties\General\TerrainTypeController',
    'api/track-surfaces'     => 'API\Properties\General\TrackSurfaceController',

    // Meet Properties
    'api/hosts'                 => 'API\Properties\Meets\HostController',
    'api/meet-names'             => 'API\Properties\Meets\NameController',
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
    Route::get('distances', 'Admin\DistanceController@index');
    Route::get('divisions', 'Coach\DivisionController@index');
    Route::get('levels', 'Admin\LevelController@index');
    Route::get('track/events', 'Admin\TrackEventController@index');
    Route::get('cross-country/events', 'Admin\CrossCountryEventController@index');
    Route::get('genders', 'Admin\GenderController@index');
    Route::get('seasons', 'Admin\SeasonController@index');
    Route::get('timing', 'Admin\TimingController@index');
    Route::get('user-roles', 'Admin\UserRoleController@index');
    Route::get('users', 'Admin\UserController@index');
    Route::get('day-times', 'Admin\DayTimeController@index');
    Route::get('race-titles', 'Admin\TitleController@index');
    Route::get('run-efforts', 'Admin\RunEffortController@index');
    Route::get('run-feelings', 'Admin\RunFeelingController@index');
    Route::get('run-types', 'Admin\RunTypeController@index');
    Route::get('terrain-types', 'Admin\TerrainTypeController@index');
    Route::get('track-surfaces', 'Admin\TrackSurfaceController@index');
});

Route::group(['middleware' => 'coach'], function () {
    Route::get('athletes', 'Coach\AthleteController@index');
    Route::get('active-athletes', 'Coach\AthleteController@index');
    Route::get('hosts', 'Coach\HostController@index');
    Route::get('meet-names', 'Coach\MeetNameController@index');
    Route::get('cross-country/venues', 'Coach\CrossCountryVenueController@index');
    Route::get('announcements', 'Coach\AnnouncementController@index');
    Route::get('team-events', 'Coach\TeamEventController@index');
    Route::get('physicals', 'Coach\PhysicalController@index');
    Route::get('physicals/{physical}', 'Coach\PhysicalController@show');
    Route::get('track/venues', 'Coach\TrackVenueController@index');
});

Route::group(['middleware' => 'user'], function () {
    Route::get('team-log', 'User\TeamLogController@index');
    Route::get('summer-running', 'User\SummerRunningController@index');
});

Route::resource('/running-log', 'User\RunningLogController');
