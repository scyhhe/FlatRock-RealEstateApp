<?php

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

Route::get('/{url}', 'HomesController@index')->where('url', '(dashboard|home|index|)')->name('home');
########################################################################################
########################## authentication #############################################
######################################################################################
Route::post('register', 'Auth\RegisterController@store');
Route::get('register_broker', 'Auth\RegisterController@create_broker');
Route::get('register_user', 'Auth\RegisterController@create_user');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Auth::routes();
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
##############################################################################
Route::resource('homes', 'HomesController');
##############################################################################
Route::get('/watchlist', 'WatchlistController@index');
Route::post('/watchlist/add/{home}', 'WatchlistController@store');

#####################################################################################
// Route::get('/home', 'HomeController@index')->name('home');
