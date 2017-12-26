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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/saran', 'SaranController@index')->name('telusur'); // showAll
Route::get('/kirim', 'SaranController@add')->name('kirimsaran');// create
Route::post('/kirim', 'SaranController@create');
Route::get('/saran/{saran}', 'SaranController@show');			// show
Route::post('/komentar', 'SaranController@commentThis');
Route::post('/support', 'SaranController@supportThis');
Route::get('/saran/coba', 'SaranController@coba');	

// Route::get('/profile/{user}', 'ProfileController@show')->name('profile');		
Route::get('/profile/{user}', function (\App\User $user) {
	return view('profile.show', ['user' => $user]);
})->name('profile');		