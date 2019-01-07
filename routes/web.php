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

Route::get('/hosts', 'Properties\Meets\HostController@index');
Route::get('/seasons', 'Properties\General\SeasonController@index');
Route::get('/timing', 'Properties\Meets\TimingController@index');
Route::get('/venues', 'Properties\Meets\VenueController@index');

Route::apiResources([
    'api/hosts' => 'API\Properties\Meets\HostController',
    'api/seasons' => 'API\Properties\General\SeasonController',
    'api/timing' => 'API\Properties\Meets\TimingController',
    'api/venues' => 'API\Properties\Meets\VenueController',
    ]);