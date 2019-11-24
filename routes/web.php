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
    return view('index');
});

Auth::routes();

Route::get('/about', function (){return view('about');})->name('about');

//TODO: Middelware voor admin check
Route::get('/admin', function (){return view('admin.index');})->name('adminpanel')->middleware('auth');

Route::get('/profile', 'UserController@show')->name('users.profile_no_id');
Route::get('/profile/{user}', 'UserController@show')->name('users.profile');

Route::get('/games', 'GameController@index')->name('games.index');
Route::post('/games', 'GameController@store')->name('games.store');
Route::get('/games/create', 'GameController@create')->name('games.create');
Route::get('/games/{game}', 'GameController@show')->name('games.one');
Route::get('/games/{game}/edit', 'GameController@edit')->name('games.edit');
Route::put('/games/{game}', 'GameController@update')->name('games.update');
Route::delete('/games/{game}', 'GameController@destroy')->name('games.delete');

Route::get('/teams', 'TeamController@index')->name('teams.index');
Route::post('/teams', 'TeamController@store')->name('teams.store');
Route::get('/teams/create', 'TeamController@create')->name('teams.create');
Route::get('/teams/{team}', 'TeamController@show')->name('teams.one');
Route::get('/teams/{team}/edit', 'TeamController@edit')->name('teams.edit');
Route::put('/teams/{team}', 'TeamController@update')->name('teams.update');
Route::delete('/teams/{team}', 'TeamController@destroy')->name('teams.delete');

Route::get('/talks', 'TalkController@index')->name('talks.index');
Route::post('/talks', 'TalkController@store')->name('talks.store');
Route::get('/talks/create', 'TalkController@create')->name('talks.create');
Route::get('/talks/{talk}', 'TalkController@show')->name('talks.one');
Route::get('/talks/{talk}/edit', 'TalkController@edit')->name('talks.edit');
Route::put('/talks/{talk}', 'TalkController@update')->name('talks.update');
Route::delete('/talks/{talk}', 'TalkController@destroy')->name('talks.delete');

Route::get('/sponsors', 'SponsorController@index')->name('sponsors.index');
Route::post('/sponsors', 'SponsorController@store')->name('sponsors.store');
Route::get('/sponsors/create', 'SponsorController@create')->name('sponsors.create');
Route::get('/sponsors/{sponsor}/edit', 'SponsorController@edit')->name('sponsors.edit');
Route::put('/sponsors/{sponsor}', 'SponsorController@update')->name('sponsors.update');
Route::delete('/sponsors/{sponsor}', 'SponsorController@destroy')->name('sponsors.delete');
