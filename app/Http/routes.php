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
// 登录页面路由配置
Route::resource('login', 'Admin\Login\LoginController');
Route::get('test', function(){
	return view('temp.index');
});
// 主页面路由
Route::resource('manage', 'Admin\Manage\ManageController');
// 服务员信息路由
Route::resource('waiter', 'Admin\Manage\WaiterController');
// 顾客信息路由
Route::resource('customer', 'Admin\Customer\CustomerController');

Route::resource('customervip', 'Admin\Customer\CustomerVipController');

Route::post('wuser/ulock', 'Admin\User\UserController@ulock');
Route::post('wuser/uspu', 'Admin\User\UserController@uspu');
Route::resource('wuser', 'Admin\User\UserController');