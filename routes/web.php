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

Route::get('/cross-country-meets', 'Meets\CrossCountryMeetController@index');
Route::get('/cross-country-meets/{crossCountryMeet}', 'Meets\CrossCountryMeetController@show');

Route::get('/athletes/{athlete}', 'AthleteProfileController@show');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/track-meets', 'Meets\TrackMeetController');

Route::get('/track-meets/{trackMeet}', 'Results\Track\TeamResultController@index');

// Route::post('track-meets/{trackMeet}/team-results', 'API\Results\Track\TeamResultController@store');
// Route::patch('track-meets/{trackMeet}/team-results/{teamResult}', 'API\Results\Track\TeamResultController@update');

Route::resource('track-meets/{trackMeet}/team-results', 'API\Results\Track\TeamResultController');
Route::resource('track-meets/{trackMeet}/team-results/{teamResult}/results', 'API\Results\Track\ResultController');

Route::resource('cross-country-meets/{crossCountryMeet}/team-results', 'API\Results\CrossCountry\TeamResultController');
Route::resource('cross-country-meets/{crossCountryMeet}/team-results/{teamResult}/results',
    'API\Results\CrossCountry\ResultController');

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
    'api/trackMeets' => 'API\Meets\TrackMeetController',
    'api/cross-country-meets' => 'API\Meets\CrossCountryMeetController',

    // General Properties
    'api/dayTimes' => 'API\Properties\General\DayTimeController',
    'api/distances'   => 'API\Properties\General\DistanceController',
    'api/seasons'     => 'API\Properties\General\SeasonController',
    'api/terrainTypes' => 'API\Properties\General\TerrainTypeController',

    // Meet Properties
    'api/hosts' => 'API\Properties\Meets\HostController',
    'api/meetNames' => 'API\Properties\Meets\NameController',
    'api/timing' => 'API\Properties\Meets\TimingController',
    'api/venues' => 'API\Properties\Meets\VenueController',

     // Race Properties
    'api/levels'      => 'API\Properties\Races\LevelController',
    'api/events'      => 'API\Properties\Races\EventController',
    'api/genders'     => 'API\Properties\Races\GenderController',
    'api/divisions'   => 'API\Properties\Races\DivisionController',
    'api/titles'   => 'API\Properties\Races\TitleController',

    // Running Log Properties
    'api/runEfforts' => 'API\Properties\RunningLog\RunEffortController',
    'api/runFeelings' => 'API\Properties\RunningLog\RunFeelingController',
    'api/runTypes' => 'API\Properties\RunningLog\RunTypeController',

    // users
    'api/user-roles'  => 'API\Users\RoleController',
    'api/users'  => 'API\Users\UserController',

    // Team Administration
    'api/announcements' => 'API\Team\AnnouncementController',
    'api/teamEvents' => 'API\Team\TeamEventController',

    // Results
//    'track-meets/{trackMeet}/team-results' => 'API\Results\Track\TeamResultController'
//    '/api/cross-country-meets/{crossCountryMeet}/team-results' => 'API\Results\CrossCountry\TeamResultController',
//    'track-meets/teamResults' => 'API\Results\Track\TeamResultController'
]);

Route::group(['middleware' => 'admin'], function () {
    Route::get('distances', 'Admin\DistanceController@index');
    Route::get('divisions', 'Coach\DivisionController@index');
    Route::get('levels', 'Admin\LevelController@index');
    Route::get('events', 'Admin\EventController@index');
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
});

Route::group(['middleware' => 'coach'], function () {
    Route::get('athletes', 'Coach\AthleteController@index');
    Route::get('active-athletes', 'Coach\AthleteController@index');
    Route::get('hosts', 'Coach\HostController@index');
    Route::get('meet-names', 'Coach\MeetNameController@index');
    Route::get('venues', 'Coach\VenueController@index');
    Route::get('announcements', 'Coach\AnnouncementController@index');
    Route::get('team-events', 'Coach\TeamEventController@index');
    Route::get('physicals', 'Coach\PhysicalController@index');
    Route::get('physicals/{physical}', 'Coach\PhysicalController@show');
});

Route::group(['middleware' => 'user'], function () {
    Route::get('team-log', 'User\TeamLogController@index');
    Route::get('summer-running', 'User\SummerRunningController@index');
});

Route::resource('/running-log', 'User\RunningLogController');
