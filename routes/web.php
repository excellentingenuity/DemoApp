<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/**
 * API Routes
 */
Route::group(['prefix' => 'api'], function() {
    /**
     * Location API Routes
     */
    Route::group(['prefix' => 'location'], function() {
        Route::get('/', 'LocationController@all');
        Route::get('/{id}', 'LocationController@view');
        Route::post('/save/{id?}', 'LocationController@save');
        Route::get('/delete/{id}', 'LocationController@delete');
        Route::get('/find/{term}', 'LocationController@find');
    });
    /**
     * Expos API Routes
     */
    Route::group(['prefix' => 'expos'], function() {
        Route::get('/upcoming', 'ExposController@upcoming');
        Route::get('/scheduled', 'ExposController@scheduled');
    });
});

/**
 * Dashboard Routes
 */
Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'DashboardController@home');
    Route::get('/expos', 'DashboardController@expos');
});

