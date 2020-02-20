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

Route::namespace('Api')->group(function () {
    Route::get('menus', 'MenusController@index');
    Route::get('settings', 'SettingsController@index');
    Route::get('posts', 'CategoriesController@index');
    Route::post('contacts', 'ContactsController@store');
    Route::get('{type}/{slug}', 'PostsController@show');
});
