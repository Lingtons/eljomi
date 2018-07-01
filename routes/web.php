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

Route::prefix('manage')->middleware('auth')->group(function(){
	Route::get('/', function () {
	    return view('manage.dashboard');
	})->name('dashboard');
	Route::resource('/types', 'Web\Manage\TypeController');
	Route::resource('/preferences', 'Web\Manage\PreferenceController');
	Route::resource('/customers', 'Web\Manage\CustomerController');
	Route::resource('/users', 'Web\Manage\UserController');
	Route::resource('/items', 'Web\Manage\ItemController');
});

Route::get('/home', 'HomeController@index')->name('home');

