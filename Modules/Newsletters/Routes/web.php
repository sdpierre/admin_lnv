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

Route::prefix('newsletters')->group(function() {
    Route::get('/', 'NewslettersController@index')->name('newsletters');
    Route::get('emails', 'NewslettersController@all_emails')->name('newsletters-emails');
    Route::post('store', 'NewslettersController@store')->name('newsletters-store');
    Route::get('delete/{id}', 'NewslettersController@destroy')->name('newsletters-delete');
    Route::get('edit/{id}', 'NewslettersController@edit')->name('newsletters-edit');
    Route::post('update/{id}', 'NewslettersController@update')->name('newsletters-update');
    Route::get('update-status/', 'NewslettersController@updateStatus')->name('update-status');
    Route::get('send-today', 'NewslettersController@sendToday')->name('send-today');
});
