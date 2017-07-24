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
//普通店员信息管理
Route::post('wuser/ulock', 'Admin\User\UserController@ulock');
Route::post('wuser/uspu', 'Admin\User\UserController@uspu');
Route::resource('wuser', 'Admin\User\UserController');
// 超级管理员
Route::post('suser/ulock', 'Admin\User\SuserController@ulock');
Route::post('suser/uspu', 'Admin\User\SuserController@uspu');
Route::resource('suser', 'Admin\User\SuserController');
// 帮助页面
Route::get('help', function(){
	return view('admin.help.help');
});

// 商品的添加GoodsController
 Route::resource('goods', 'Admin\Goods\GoodsController');
 Route::post('add', 'Admin\Goods\GoodsController@addgoods');
 // 商品的销售账单SaleController
  Route::resource('sale', 'Admin\Goods\SaleController');
 
  Route::post('getMonthData', 'Admin\Goods\SaleController@getMonthData');
  // 进货账单详情
   Route::resource('stock', 'Admin\Goods\StockController');
    Route::post('getMonth', 'Admin\Goods\StockController@getMonthData');

    // 服务员的销售账单
     Route::resource('wsale', 'Admin\Sale\WSaleController');
     // 总的销售账单
    Route::resource('totlesalet', 'Admin\Sale\TSaleController');
    
        Route::post('wsalegetmonth', 'Admin\Sale\WSaleController@getMonthData');