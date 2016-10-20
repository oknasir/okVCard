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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/resume/{type}', function ($type) {
    return view('resume.'.$type);
});

Route::group(['prefix' => '/'], function ($ng) {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('{ng}', function ($ng) {
        info($ng);
        return view('welcome');
    });
});
