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


// 路由参数匹配
// Route::get('zs/{name?}', function ($name = 345) {
//     return $name;
// })->where('name', '[0-9]+');

// Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
// 	var_dump($postId,$commentId);
//     //
// });
Route::get('/', function () {
    return view('index');
});


