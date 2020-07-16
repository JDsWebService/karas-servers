<?php

use Illuminate\Support\Facades\Route;

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

// Normal Route
Route::get('/', 'PagesController@index')->name('index');
// Coming Soon Routes
// Route::get('/', 'PagesController@comingsoon')->name('index');
// Route::get('/comingsoon', 'PagesController@comingsoon')->name('comingsoon');

// Single Pages Group
Route::name('pages.')->group(function () {

	// FAQ Page
	Route::get('/faq', 'PagesController@faq')->name('faq');

});

// Socialite Login
Route::get('login/discord', 'Auth\LoginController@redirectToProvider')->name('login.discord');
Route::get('login/discord/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// User Dashboard Routes
Route::prefix('user')->name('user.')->group(function () {
	Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
});