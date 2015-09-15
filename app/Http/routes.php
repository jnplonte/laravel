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

// route to show the login form
Route::get('/', array('as' => 'home', 'uses' => 'Home\HomeController@getIndex'));

//register
Route::get('register', array('as' => 'get.register', 'uses' => 'Register\RegisterController@getRegister'));
Route::post('register', array('as' => 'post.register', 'uses' => 'Register\RegisterController@postRegister'));

//login
Route::get('login', array('as' => 'get.login', 'uses' => 'Login\LoginController@getLogin'));
Route::post('login', array('as' => 'post.login', 'uses' => 'Login\LoginController@postLogin'));

//logout
Route::get('logout', array('as' => 'get.logout', 'uses' => 'Logout\LogoutController@getLogout'));

//forgot
Route::get('forgot', array('as' => 'get.forgot', 'uses' => 'Register\ForgotController@getForgot'));
Route::post('forgot', array('as' => 'post.forgot', 'uses' => 'Register\ForgotController@postForgot'));

//reset
Route::get('reset/{token}', array('as' => 'get.reset', 'uses' => 'Register\ForgotController@getReset'));
Route::post('reset', array('as' => 'post.reset', 'uses' => 'Register\ForgotController@postReset'));

//profile
Route::get('profile-settings', array('as' => 'get.profile', 'uses' => 'Settings\ProfileController@getIndex'));
Route::post('profile-settings', array('as' => 'post.profile', 'uses' => 'Settings\ProfileController@postIndex'));
