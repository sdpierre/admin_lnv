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

Route::prefix('annonces')->group(function() {
    Route::get('/', 'AnnoncesController@index');
    Route::get('rubrique/{id}', 'AnnoncesController@rubrique')->name('annonces-rubrique');
    Route::get('details/{id}', 'AnnoncesController@show')->name('details');
    Route::post('search', 'AnnoncesController@search')->name('search');
    Route::get('destroy/{id}', 'AnnoncesController@destroy')->name('destroy');
    Route::post('publier_annonce', 'AnnoncesController@publier_annonce')->name('publier_annonce');
});

