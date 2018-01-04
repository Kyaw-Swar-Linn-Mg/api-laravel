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

Route::group(['middleware'=>'jwt.auth'],function () {
    Route::get('/userApi', [
        'uses' => 'ApiController@index',
        'as' => 'userApi'
    ]);

    Route::get('/userApi/{id}', [
        'uses' => 'ApiController@show',
        'as' => 'userApi'
    ]);

    Route::post('/userApi', [
        'uses' => 'ApiController@store',
        'as' => 'userApi'
    ]);

    Route::put('/userApi/{id}', 'ApiController@update');

    Route::delete('/userApi/{id}', 'ApiController@delete');

});

Route::get('/apiToken',[
    'uses'=>'ApiTokenController@authenticate',
    'as'=>'apiToken'
]);