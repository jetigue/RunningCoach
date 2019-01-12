<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/athletes', 'AthleteController');

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

Route::apiResources([
    
    'api/athletes' => 'API\AthleteController',

    // General Properties
    'api/distances' => 'API\Properties\General\DistanceController',
    'api/seasons' => 'API\Properties\General\SeasonController',

    // Meet Properties
    'api/hosts' => 'API\Properties\Meets\HostController',
    'api/meet-names' => 'API\Properties\Meets\NameController',
    'api/timing' => 'API\Properties\Meets\TimingController',
    'api/venues' => 'API\Properties\Meets\VenueController',

    // Race Properties
    'api/divisions' => 'API\Properties\Races\DivisionController',
    'api/events' => 'API\Properties\Races\EventController',
    'api/genders' => 'API\Properties\Races\GenderController',
]);