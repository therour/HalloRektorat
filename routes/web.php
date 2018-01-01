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

Route::prefix('admin')->name('admin.')->group(function () {
	Route::get('/', 'Admin\AdminController@index')->name('dashboard');
	Route::get('/sarans', 'Admin\SaranController@index')->name('saran');
	Route::get('/users', 'Admin\UserController@index')->name('user');
	Route::get('/stats', 'Admin\AdminController@index')->name('stats');	
	Route::post('/tanggapi/{saran}', 'Admin\SaranController@tanggapi')->name('tanggapi');
	Route::delete('/saran/delete/{saran}', 'Admin\SaranController@destroy')->name('saran.delete');
});

// Route::get('/coba', function () {
// 	return view('formTambah');
// });


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/tentang-kita', 'HomeController@about')->name('about');	

Route::get('/sarans/{urutan}', 'SaranController@index'); 	// urutkan
Route::get('/saran', 'SaranController@index')->name('telusur'); // showAll
Route::get('/kirim', 'SaranController@add')->name('kirimsaran');// create
Route::post('/kirim', 'SaranController@create');
Route::get('/saran/{saran}', 'SaranController@show');			// show

Route::post('/komentar', 'SaranController@commentThis');
Route::post('/support', 'SaranController@supportThis');
Route::get('/saran/coba', 'SaranController@coba');	

Route::get('/profile/{user}', 'ProfileController@show')->name('profile');		
Route::get('/editProfile', 'ProfileController@edit')->name('editProfile');
Route::put('/editProfile', 'ProfileController@updateProfile')->name('editProfile');


// GET DATA TARGET
Route::get('/targets', 'ApiController@getTargets');
Route::get('/targets/{id}', 'ApiController@getTarget');

