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
})->name('home');

Route::get('/about', function () {return view('about');})->name('about');

Auth::routes();

//Route::get('/about', function (){return view('about');})->name('about');

//Route::get('/admin/statistics', function (){return view('admin.statistics');})->name('adminpanel.statistics')->middleware('admin');
Route::get('/admin/games', 'GameController@admin_index')->name('adminpanel.games')->middleware('admin');
Route::get('/admin/talks', 'TalkController@admin_index')->name('adminpanel.talks')->middleware('admin');
Route::get('/admin/users', 'UserController@index')->name('adminpanel.users')->middleware('admin');
Route::get('/admin/teams', 'TeamController@admin_index')->name('adminpanel.teams')->middleware('admin');
Route::get('/admin/sponsors', 'SponsorController@admin_index')->name('adminpanel.sponsors')->middleware('admin');

/*
 * Profile
 */
Route::get('/profile', 'UserController@show')->name('users.ownProfile');
Route::get('/profile/{user}', 'UserController@show')->name('users.profile');

/*
 * Users
 */
Route::get('/users/{user}/toggleAdmin', 'UserController@toggleAdmin')->name('users.toggleAdmin')->middleware('admin');
Route::delete('/users/{user}', 'UserController@destroy')->name('users.delete')->middleware('ownUser');

/*
 * Games
 */
Route::get('/games', 'GameController@index')->name('games.index');
Route::post('/games', 'GameController@store')->name('games.store')->middleware('admin');
Route::get('/games/create', 'GameController@create')->name('games.create')->middleware('admin');
Route::get('/games/{game}/edit', 'GameController@edit')->name('games.edit')->middleware('admin');
Route::put('/games/{game}', 'GameController@update')->name('games.update')->middleware('admin');
Route::delete('/games/{game}', 'GameController@destroy')->name('games.delete')->middleware('admin');

/*
 * Teams
 */
Route::get('/teams', 'TeamController@index')->name('teams.index');
Route::post('/teams', 'TeamController@store')->name('teams.store');
Route::get('/teams/create', 'TeamController@create')->name('teams.create');
Route::get('/teams/{team}', 'TeamController@show')->name('teams.one');
Route::get('/teams/{team}/edit', 'TeamController@edit')->name('teams.edit')->middleware('teamleader');
Route::put('/teams/{team}', 'TeamController@update')->name('teams.update')->middleware('teamleader');
Route::delete('/teams/{team}/{user}', 'TeamController@remove_user')->name('teams.removeUser')->middleware('teamleader');
Route::delete('/teams/{team}', 'TeamController@destroy')->name('teams.delete')->middleware('teamleader');

/*
 * Teamrequests
 */
Route::post('/teams/{team}/request', 'TeamrequestController@store')->name('teamrequests.store');
Route::post('/teamrequests/{teamrequest}/acceptRequest', 'TeamrequestController@accept')->name('teamrequests.accept')->middleware('teamleader');
Route::post('/teamrequests/{teamrequest}/rejectRequest', 'TeamrequestController@reject')->name('teamrequests.reject')->middleware('teamleader');
Route::delete('/teamrequests/{teamrequest}/deleteRequest', 'TeamrequestController@destroy')->name('teamrequests.delete');

/*
 * Talks
 */
Route::get('/talks', 'TalkController@index')->name('talks.index');
Route::post('/talks', 'TalkController@store')->name('talks.store')->middleware('admin');
Route::get('/talks/create', 'TalkController@create')->name('talks.create')->middleware('admin');
Route::get('/talks/{talk}', 'TalkController@show')->name('talks.one');
Route::post('/talks/{talk}/add', 'TalkController@user_add')->name('talks.add')->middleware('auth');
Route::post('/talks/{talk}/remove', 'TalkController@user_remove')->name('talks.remove')->middleware('auth');
Route::get('/talks/{talk}/edit', 'TalkController@edit')->name('talks.edit')->middleware('admin');
Route::put('/talks/{talk}', 'TalkController@update')->name('talks.update')->middleware('admin');
Route::delete('/talks/{talk}', 'TalkController@destroy')->name('talks.delete')->middleware('admin');

/*
 * Sponsors
 */
Route::post('/sponsors', 'SponsorController@store')->name('sponsors.store')->middleware('admin');
Route::get('/sponsors/create', 'SponsorController@create')->name('sponsors.create')->middleware('admin');
Route::get('/sponsors/{sponsor}/edit', 'SponsorController@edit')->name('sponsors.edit')->middleware('admin');
Route::put('/sponsors/{sponsor}', 'SponsorController@update')->name('sponsors.update')->middleware('admin');
Route::delete('/sponsors/{sponsor}', 'SponsorController@destroy')->name('sponsors.delete')->middleware('admin');

/*
 * Seats
 */
Route::get('/seatmap/team/{team}', 'SeatController@index')->name('seatmap');
//Route::get('/games', 'GameController@index')->name('games.index');
//Route::post('/games', 'GameController@store')->name('games.store')->middleware('admin');
//Route::get('/games/create', 'GameController@create')->name('games.create')->middleware('admin');
//Route::get('/games/{game}/edit', 'GameController@edit')->name('games.edit')->middleware('admin');
Route::put('/seatmap/{team}', 'SeatController@claim_seats')->name('seats.claim');
//Route::delete('/games/{game}', 'GameController@destroy')->name('games.delete')->middleware('admin');
