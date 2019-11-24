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

Route::get('/admin', function (){return view('admin.index');})->name('adminpanel')->middleware('admin');

Route::get('/profile', 'UserController@show')->name('users.ownProfile');
Route::get('/profile/{user}', 'UserController@show')->name('users.profile');

Route::get('/games', 'GameController@index')->name('games.index');
Route::post('/games', 'GameController@store')->name('games.store')->middleware('admin');
Route::get('/games/create', 'GameController@create')->name('games.create')->middleware('admin');
Route::get('/games/{game}', 'GameController@show')->name('games.one');
Route::get('/games/{game}/edit', 'GameController@edit')->name('games.edit')->middleware('admin');
Route::put('/games/{game}', 'GameController@update')->name('games.update')->middleware('admin');
Route::delete('/games/{game}', 'GameController@destroy')->name('games.delete')->middleware('admin');

//TODO: Middleware to check if user is creator of team
Route::get('/teams', 'TeamController@index')->name('teams.index');
Route::post('/teams', 'TeamController@store')->name('teams.store');
Route::get('/teams/create', 'TeamController@create')->name('teams.create');
Route::get('/teams/{team}', 'TeamController@show')->name('teams.one');
Route::get('/teams/{team}/edit', 'TeamController@edit')->name('teams.edit');
Route::put('/teams/{team}', 'TeamController@update')->name('teams.update');
Route::delete('/teams/{team}', 'TeamController@destroy')->name('teams.delete');

Route::get('/talks', 'TalkController@index')->name('talks.index');
Route::post('/talks', 'TalkController@store')->name('talks.store')->middleware('admin');
Route::get('/talks/create', 'TalkController@create')->name('talks.create')->middleware('admin');
Route::get('/talks/{talk}', 'TalkController@show')->name('talks.one');
Route::post('/talks/{talk}/add', 'TalkController@user_add')->name('talks.add')->middleware('auth');
Route::post('/talks/{talk}/remove', 'TalkController@user_remove')->name('talks.remove')->middleware('auth');
Route::get('/talks/{talk}/edit', 'TalkController@edit')->name('talks.edit')->middleware('admin');
Route::put('/talks/{talk}', 'TalkController@update')->name('talks.update')->middleware('admin');
Route::delete('/talks/{talk}', 'TalkController@destroy')->name('talks.delete')->middleware('admin');

Route::get('/sponsors', 'SponsorController@index')->name('sponsors.index');
Route::post('/sponsors', 'SponsorController@store')->name('sponsors.store')->middleware('admin');
Route::get('/sponsors/create', 'SponsorController@create')->name('sponsors.create')->middleware('admin');
Route::get('/sponsors/{sponsor}/edit', 'SponsorController@edit')->name('sponsors.edit')->middleware('admin');
Route::put('/sponsors/{sponsor}', 'SponsorController@update')->name('sponsors.update')->middleware('admin');
Route::delete('/sponsors/{sponsor}', 'SponsorController@destroy')->name('sponsors.delete')->middleware('admin');
