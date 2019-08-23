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



Route::post('/user','UserController@store');
Route::post('/admin','AdminController@store');


// 預設Ｕser Route

// 群組化

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', 'UserController@show');
    Route::put('/user', 'UserController@update');
    Route::delete('/user', 'UserController@destroy');
});


// Route::get('/user/{id}', 'UserController@show')->middleware('auth:api');
// Route::put('/user/{id}', 'UserController@update')->middleware('auth:api');
// Route::delete('/user/{id}', 'UserController@destroy')->middleware('auth:api');




 //  預設Admin Route
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', 'AdminController@show');
    Route::put('/admin', 'AdminController@update');
    Route::delete('/admin/{id}', 'AdminController@destroy');
});
