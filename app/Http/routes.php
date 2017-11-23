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

//
Route::get('/','usercontroller@getIndex');
Route::get('register','registercontroller@getRegister');
Route::post('r','registercontroller@postRegister');
Route::get('login','logincontroller@getLogin');
Route::post('loggingin','logincontroller@postLogin');
Route::get('logout','logincontroller@getLogout');

Route::get('verifycode','registercontroller@getVerify');
Route::post('verification','registercontroller@postVerify');
