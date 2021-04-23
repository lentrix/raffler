<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'SiteController@index');

Route::get('/login', 'SiteController@loginForm');

Route::post('/login', 'SiteController@login')->name('login');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/participants', 'ParticipantController@index');
    Route::get('/participants/{participant}', 'ParticipantController@view');
    Route::put('/participants/{participant}', 'ParticipantController@update');

    Route::get('/items', 'ItemController@index');
    Route::get('/items/{item}', 'ItemController@view');
    Route::put('/items/{item}', 'ItemController@update');

    Route::group(['prefix'=>'api'], function() {
        Route::get('/items', 'ItemController@getAvailable');

        Route::get('/participants/{inclusive}', 'ParticipantController@getParticipants');
    });

});
