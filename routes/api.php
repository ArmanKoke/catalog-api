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
    Route::get('users', 'UserController@index')->name('users.index')->middleware('permission');
    Route::post('users', 'UserController@store')->name('users.store')->middleware('permission');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('permission');
    Route::put('users/{user}', 'UserController@update')->name('users.update')->middleware('permission');
    Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('permission');
    Route::post('users/issue_token', 'UserController@issueToken')->name('users.issueToken')->middleware('permission');
    Route::post('users/detach_from_role', 'UserController@detachFromRole')->name('users.detachFromRole')->middleware('permission');

    Route::get('categories', 'CategoryController@index')->name('categories.index');
    Route::post('categories', 'CategoryController@store')->name('categories.store')->middleware('permission');
    Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.destroy')->middleware('permission');
    Route::put('categories/{category}', 'CategoryController@update')->name('categories.update')->middleware('permission');
    Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');

    Route::get('items', 'ItemController@index')->name('items.index');
    Route::post('items', 'ItemController@store')->name('items.store')->middleware('permission');
    Route::delete('items/{item}', 'ItemController@destroy')->name('items.destroy')->middleware('permission');
    Route::put('items/{item}', 'ItemController@update')->name('items.update')->middleware('permission');
    Route::get('items/{item}', 'ItemController@show')->name('items.show');
    Route::post('items/detach_from_category', 'ItemController@detachFromCategory')->name('items.detachFromCategory')->middleware('permission');
    Route::post('items/filter', 'ItemController@filter')->name('items.filter');

    Route::get('tags', 'TagController@index')->name('tags.index');
    Route::post('tags', 'TagController@store')->name('tags.store')->middleware('permission');
    Route::delete('tags/{tag}', 'TagController@destroy')->name('tags.destroy')->middleware('permission');
    Route::put('tags/{tag}', 'TagController@update')->name('tags.update')->middleware('permission');
    Route::get('tags/{tag}', 'TagController@show')->name('tags.show');
    Route::post('tags/detach_from_category', 'TagController@detachFromCategory')->name('tags.detachFromCategory')->middleware('permission');
    Route::post('tags/detach_from_item', 'TagController@detachFromItem')->name('tags.detachFromItem')->middleware('permission');
});
