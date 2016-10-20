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


Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'location'], function() {
        Route::get('/', 'LocationController@all');
        Route::get('/{id}', 'LocationController@view');
        Route::post('/save/{id?}', 'LocationController@save');
        Route::get('/delete/{id}', 'LocationController@delete');
        Route::get('/find/{term}', 'LocationController@find');
    });
});


