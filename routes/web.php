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

Route::get('/targets', function () {
	$a['data'] = \App\Target::all();
	return json_encode( (object) $a);
});
Route::get('/targets/{id}', function ($id) {
	$a['data'] = \App\Target::where('parent_id', $id)->get();
	return json_encode( (object) $a);
});
Route::get('/lihatUserEmail', function () {
	$users = \App\User::all();
	echo "<center><table>";
	echo "<thead><tr><th>Name</th><th>Email</th><th>Password</th></tr></thead>";
	echo "<tbody>";
	foreach ($users as $i => $user) {
		if ($i == 0) continue;
		echo "<tr><td>".$user->name."</td><td>".$user->email."</td><td>123123</td></tr>";
	}
	echo "</tbody>";
	echo "</table></center>";
});

// Route::get('/home', 'HomeController@index')->name('home');

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