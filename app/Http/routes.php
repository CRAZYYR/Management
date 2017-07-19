<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'Admin\Login\LoginController@index');
Route::get('loginout', 'Admin\Login\LoginController@loginout');
Route::resource('login', 'Admin\Login\LoginController');
Route::get('test', function(){
	return view('temp.index');
});
Route::resource('manage', 'Admin\Manage\ManageController');

