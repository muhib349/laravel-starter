<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'middleware' => 'api', 'namespace' => 'App\Http\Controllers\Api'], function () {

    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('login', 'AuthController@login');
        Route::get('logout', 'AuthController@logout');
        Route::get('refresh', 'AuthController@refresh');
        Route::get('me', 'AuthController@me');
    });

    Route::group([
        'prefix' => 'admin',
    ], function ($router) {
        Route::get('roles',"RolesController@index")->middleware('hasPermission:role-list');
        Route::post('roles','RolesController@store')->middleware('hasPermission:role-create');
        Route::get('roles/{id}',"RolesController@show")->middleware('hasPermission:role-show');
        Route::put('roles/{id}',"RolesController@update")->middleware('hasPermission:role-edit');
    });
});
