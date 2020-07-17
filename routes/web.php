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

Route::prefix('servers')->name('servers.')->group(function () {
	Route::middleware(['auth.staff', 'auth'])->group(function () {
		// Ping Test
		Route::get('ping-test', 'ServersController@pingtest')->name('ping-test');
		// Add Server To List
		Route::get('add', 'ServersController@addServer')->name('add');
		Route::post('add', 'ServersController@storeServer')->name('store');
	});

	// Servers List
	// Route::get('/', 'ServersController@list')->name('list');
});

// Socialite Login
Route::get('login/discord', 'Auth\LoginController@redirectToProvider')->name('login.discord');
Route::get('login/discord/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// User Dashboard Routes
Route::prefix('user')->name('user.')->group(function () {
	Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
});