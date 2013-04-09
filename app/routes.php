<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@showLogin');
Route::get('500', 'ErrorController@show500');

/*---------- Login ----------------------------------------------------------*/

Route::get('login', 'UserController@getUserLogin');
Route::get('disconnect','UserController@getUserDisconnect');
Route::post('login', 'UserController@postUserLogin');

/*---------- SignUp --------------------------------------------------------*/

Route::get('signup', 'UserController@getUserSignUp');
Route::post('signup', 'UserController@postUserSignUp');

/*---------Normal user ---------------------------------------------------*/
Route::get('userhome', 'HomeController@showHome');
Route::get('modules', 'ModulesController@showModules');
Route::get('profile', 'ProfileController@showProfile');
Route::get('showmodule/{moduleId}', 'ModulesController@showModule');


/*---------LMS functions ---------------------------------------------------*/
Route::get('lms/initialize', 'LMSController@initialize');
Route::get('lms/value/{varname}', 'LMSController@getValue');
Route::post('lms/value/{varname}', 'LMSController@setValue');
Route::get('lms/commit', 'LMSController@getCommit');
Route::get('lms/finish', 'LMSController@getFinish');
Route::get('lms/lasterror', 'LMSController@getLastError');
Route::get('lms/diagnostic/{errorcode}', 'LMSController@getDiagnostic');
Route::get('lms/errorstring/{errorcode}', 'LMSController@getErrorString');








