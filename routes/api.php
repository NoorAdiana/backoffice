<?php

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

Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function() {
    Route::get('/', 'UsersController@index');
    Route::post('/', 'UsersController@store');
    Route::get('/{id}', 'UsersController@show');
    Route::post('/{id}', 'UsersController@update');
    Route::delete('/{id}', 'UsersController@destroy');
});
