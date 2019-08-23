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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    var_dump(Auth::user());
    return $request->user();
});



Route::post('/user','UserController@store');


// 預設Ｕser Route

// 群組化

//Route::group(['middleware' => ['auth:api']], function () {
//    Route::get('/User/{id}', 'UserController@show');
//    Route::put('/User/{id}', 'UserController@update');
//    Route::delete('/User{id}', 'UserController@destory');
//});


// Route::get('/User/{id}', 'UserController@show')->middleware('auth:api');
// Route::put('/User/{id}', 'UserController@update')->middleware('auth:api');
// Route::delete('/User{id}', 'UserController@destory')->middleware('auth:api');




// 預設Admin Route
// Route::get('/Admin/{id}', 'AdminController@show')->middleware('auth:admin.api');
// Route::put('/Admin/{id}', 'AdminController@update')->middleware('auth:admin.api');
// Route::delete('/Admin/{id}', 'AdminController@destory')->middleware('auth:admin.api');
