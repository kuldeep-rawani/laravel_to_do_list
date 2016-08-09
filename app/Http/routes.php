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

 Route::get('/', function () {
	
     return view('index');
 });
 Route::get('permission', function () {
	
     return view('permission');
 });
 Route::get('register',function(){
 	return view('register');

 });

 Route::post('login', 'ListsController@login');
 Route::post('registration', 'ListsController@store');
 

Route::get('after_login',function(){
 	return view('after_login');

 });
Route::get('logout','ListsController@logout');
Route::post('add_task','ListsController@add_task');
Route::get('show_task','ListsController@show_task');
Route::get('remove_task','ListsController@remove_task');
 
  Route::get('new_display_task','ListsController@new_show_task');
  Route::post('checking_check_box','ListsController@checking_check_box');
   Route::get('update',function(){
      return view('update');
  });
  Route::post('update_task','ListsController@update_task'); 


	

 