<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/upload-file', 'UploadFileNG');

Route::get('/heroes', function () {
    return json_decode('[{"id":11,"name":"Mr. Nice"},{"id":12,"name":"Narco"},{"id":13,"name":"Bombasto"},{"id":14,"name":"Celeritas"},{"id":15,"name":"Magneta"},{"id":16,"name":"RubberMan"},{"id":17,"name":"Dynama"},{"id":18,"name":"Dr IQ"},{"id":19,"name":"Magma"},{"id":20,"name":"Tornado"}]', true);
});
