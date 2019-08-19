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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function ()
{
	return redirect()->route('index');
});

Route::get('/index', 'TaskController@index')->name('index');

Route::post('/store', 'TaskController@store')->name('store');

Route::post('/destroy/{id}', 'TaskController@destroy')->name('destroy');