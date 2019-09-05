<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    var_dump(Auth::user());
//    return $request->user();
//});



Route::post('/nurse/login', 'NurseController@login');
Route::post('/nurse/register', 'NurseController@register');
Route::group(['middleware' => 'auth:nurse'], function(){
    Route::delete('/details', 'NurseController@details');

});




























// 註冊用
Route::post('/user','UserController@store');
Route::post('/admin','AdminController@store');


// 登入用
Route::post('/admin/login','AdminLoginController@AdminLogin');
Route::post('/user/login','UserLoginController@UserLogin');




// 群組化

// 預設Uer的驗證（透過token），讀取、更改、刪除、登出
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', 'UserController@show');
    Route::put('/user', 'UserController@update');
    Route::delete('/user/{api_token}', 'UserController@destroy');
    Route::get('/user', 'UserLogoutController@UserLogout');

});


// Route::get('/user/{id}', 'UserController@show')->middleware('auth:api');
// Route::put('/user/{id}', 'UserController@update')->middleware('auth:api');
// Route::delete('/user/{id}', 'UserController@destroy')->middleware('auth:api');




// 預設Admin的驗證（透過token），讀取、更改、刪除、登出
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', 'AdminController@show');
    Route::put('/admin', 'AdminController@update');
    Route::delete('/admin/{id}', 'AdminController@destroy');
    Route::get('/admin', 'AdminLogoutController@AdminLogout');
});
