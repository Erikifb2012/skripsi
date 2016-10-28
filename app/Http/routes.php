<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/admin', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/','UploadsController@index');
Route::post('/upload','UploadsController@uploadfile');
Route::get('getUpload','UploadController@getupload');
Route::get('/pdf','UploadsController@konvertpdf');