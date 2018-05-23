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
Route::get('/dashboard', function () {
    return view('dashboard');
});
// Route::get('/user', function () {
//     return view('user');
// });
// Route::get('/table', function () {
//     return view('table');
// });
Route::get('/typography', function () {
    return view('typography');
});
Route::get('/icons', function () {
    return view('icons');
});
Route::get('/maps', function () {
    return view('maps');
});
Route::get('/notifications', function () {
    return view('notifications');
});
Route::get('/upgrade', function () {
    return view('upgrade');
});

Route::get('/test', function(){
	return view('test');
});



Auth::routes();

Route::get('/home', 'MainController@index')->name('home');
Route::get('/input', 'MainController@input')->name('input');
Route::get('/user', 'MainController@inputUser')->name('user');
Route::post('/insert', 'MainController@insert')->name('insert');
Route::get('/edit/{id}', 'MainController@edit')->name('edit');
Route::patch('/update/{id?}', 'MainController@update')->name('update');
Route::get('/delete/{id?}', 'MainController@delete')->name('delete');
Route::get('/export', 'MainController@export')->name('export');
Route::get('/table', 'MainController@show')->name('table');
Route::get('/insert', 'MainController@insert')->name('insert');
Route::post('/import', 'MainController@import')->name('import');


Route::get('chart', 'MainController@chart')->name('chart');


