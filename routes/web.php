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

// Route::get('/cars', 'CarController@dashboard')->name('cars');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/saran', 'SaranController@index')->name('telusur'); // showAll
Route::get('/kirim', 'SaranController@add')->name('kirimsaran');// create
Route::get('/saran/{saran}', 'SaranController@show');			// show
Route::get('/saran/coba', 'SaranController@coba');