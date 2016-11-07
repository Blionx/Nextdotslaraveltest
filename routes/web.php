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

Route::get('/', function () {
    return view('Layouts.login');
});
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');
Route::get('/dashboard','HomeController@index');
Route::get('/Property','PropertyController@index');
Route::get('/createPropery','PropertyController@create');
Route::post('/PropertyCreatpr','PropertyController@creator');
Route::get('/deleteProperty/{id}','PropertyController@deletor');
Route::get('/editProperty/{id}','PropertyController@edit');
Route::post('/editorProperty/{id}','PropertyController@editor');
