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

Route::middleware('auth:api')->group(function () {
    Route::apiResource('user', 'UserController');
    Route::post('user/issue_token', 'UserController@issueToken');
    Route::post('user/detach_from_role', 'UserController@detachFromRole');

    Route::apiResource('category', 'CategoryController');

    Route::apiResource('item', 'ItemController');
    Route::post('item/detach_from_category', 'ItemController@detachFromCategory');
});
