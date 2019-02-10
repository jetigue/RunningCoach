<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/athletes', 'AthleteController');
Route::resource('/track-meets', 'Meets\TrackMeetController');

// General Properties
Route::get('/distances', 'Properties\General\DistanceController@index');
Route::get('/seasons', 'Properties\General\SeasonController@index');

// Meet Properties
Route::get('/hosts', 'Properties\Meets\HostController@index');
Route::get('/meet-names', 'Properties\Meets\NameController@index');
Route::get('/timing', 'Properties\Meets\TimingController@index');
Route::get('/venues', 'Properties\Meets\VenueController@index');

// Race Properties
Route::get('/divisions', 'Properties\Races\DivisionController@index');
Route::get('/events', 'Properties\Races\EventController@index');
Route::get('/genders', 'Properties\Races\GenderController@index');

Route::get('/track-meets/{trackMeet}', 'Results\Track\TeamResultController@index');

//Users
Route::get('/user-roles', 'Users\RoleController@index');

// Route::post('track-meets/{trackMeet}/team-results', 'API\Results\Track\TeamResultController@store');
// Route::patch('track-meets/{trackMeet}/team-results/{teamResult}', 'API\Results\Track\TeamResultController@update');

Route::resource('track-meets/{trackMeet}/team-results', 'API\Results\Track\TeamResultController');
Route::resource('track-meets/{trackMeet}/team-results/{teamResult}/results', 'API\Results\Track\ResultController');

Route::apiResources([

    'api/athletes' => 'API\AthleteController',
    // Meets
    'api/trackMeets' => 'API\Meets\TrackMeetController',

    // General Properties
    'api/distances'   => 'API\Properties\General\DistanceController',
    'api/seasons'     => 'API\Properties\General\SeasonController',

    // Meet Properties
    'api/hosts' => 'API\Properties\Meets\HostController',
    'api/meetNames' => 'API\Properties\Meets\NameController',
    'api/timing' => 'API\Properties\Meets\TimingController',
    'api/venues' => 'API\Properties\Meets\VenueController',

    // Race Properties
    'api/divisions'   => 'API\Properties\Races\DivisionController',
    'api/events'      => 'API\Properties\Races\EventController',
    'api/genders'     => 'API\Properties\Races\GenderController',

    // Users
    'api/roles'  => 'API\Users\RoleController',

    // Results
//    'track-meets/{trackMeet}/team-results' => 'API\Results\Track\TeamResultController'
   'track-meets/teamResults' => 'API\Results\Track\TeamResultController'
]);