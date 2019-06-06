<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/track-meets', 'Meets\TrackMeetController');

Route::get('/track-meets/{trackMeet}', 'Results\Track\TeamResultController@index');

// Route::post('track-meets/{trackMeet}/team-results', 'API\Results\Track\TeamResultController@store');
// Route::patch('track-meets/{trackMeet}/team-results/{teamResult}', 'API\Results\Track\TeamResultController@update');

Route::resource('track-meets/{trackMeet}/team-results', 'API\Results\Track\TeamResultController');
Route::resource('track-meets/{trackMeet}/team-results/{teamResult}/results', 'API\Results\Track\ResultController');

Route::apiResources([

    'api/athletes' => 'API\AthleteController',
    // Meets
    'api/trackMeets' => 'API\Meets\TrackMeetController',

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
    'api/levels'   => 'API\Properties\Races\LevelController',
    'api/events'      => 'API\Properties\Races\EventController',
    'api/genders'     => 'API\Properties\Races\GenderController',
    'api/divisions' => 'API\Properties\Races\DivisionController',

    // Running Log
    'api/runEfforts' => 'API\RunningLog\RunEffortController',
    'api/runFeelings' => 'API\RunningLog\RunFeelingController',
    'api/runTypes' => 'API\RunningLog\RunTypeController',


    // Users
    'api/roles'  => 'API\Users\RoleController',
    'api/users'  => 'API\Users\UserController',

    // Team Administration
    'api/announcements' => 'API\Team\AnnouncementController',

    // Results
//    'track-meets/{trackMeet}/team-results' => 'API\Results\Track\TeamResultController'
   'track-meets/teamResults' => 'API\Results\Track\TeamResultController'
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
    Route::get('dayTimes', 'Admin\DayTimeController@index');
    Route::get('runEfforts', 'Admin\RunEffortController@index');
    Route::get('runFeelings', 'Admin\RunEffortController@index');
    Route::get('runTypes', 'Admin\RunTypeController@index');
    Route::get('terrainTypes', 'Admin\TerrainTypeController@index');
});

Route::group(['middleware' => 'coach'], function () {
    Route::get('athletes', 'Coach\AthleteController@index');
    Route::get('hosts', 'Coach\HostController@index');
    Route::get('meet-names', 'Coach\MeetNameController@index');
    Route::get('venues', 'Coach\VenueController@index');
    Route::get('announcements', 'Coach\AnnouncementController@index');
});
