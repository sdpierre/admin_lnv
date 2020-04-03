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

Route::prefix('widgets')->group(function() {
    Route::get('/', 'WidgetsController@index');
    Route::post('widget_update_corona/{id}', 'WidgetsController@updateCorona')->name('widget_update_corona');
});