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
    return $request->user();
});

Route::resource('Loves','LoveController');

Route::post('/Love','LoveController@store');

Route::get('/Love','LoveController@index');
Route::get('/Love/{lid}','LoveController@show');

Route::put('/Love/{lid}', 'LoveController@update');


Route::delete('/Love/{lid}', 'LoveController@destroy');


