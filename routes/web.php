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

Route::get('login/{social}', 'Auth\SocialController@redirectToProvider');
Route::get('login/{social}/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('/home', 'HomeController@index');

Route::get('/resume/{type}', function ($type) {
    info('Load template for Angular: ' . $type);
    return view('resume.' . $type);
});

Route::group(['prefix' => '/'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('{ng}', function ($ng) {
        info('Page called of resume: ' . $ng);
        return view('welcome');
    });

});
