<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::pattern('{news}', '[0-9]+');
Route::pattern('{category}', '[0-9]+');

Route::get('/', 'NewsController@index');
Route::get('news/{news}', 'NewsController@show');
Route::get('category/{category}', 'NewsController@category');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('manager', 'ManagerController');
});
