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
	// About Us Page
	Route::get('about', 'PagesController@about')->name('about');
	// FAQ Page
	Route::get('faq', 'PagesController@faq')->name('faq');

});

Route::prefix('servers')->name('servers.')->group(function () {
	// Admin Server Routes
	// Route::prefix('admin')->middleware(['auth.staff', 'auth'])->group(function () {
	// 	// Ping Test
	// 	Route::get('ping-test', 'ServersController@pingtest')->name('ping-test');
	// 	// Add Server To List
	// 	Route::get('add', 'ServersController@addServer')->name('add');
	// 	Route::post('add', 'ServersController@storeServer')->name('store');
	// });

	// Server Rules
	Route::prefix('rules')->name('rules.')->group(function () {
		// English Rules Route
		Route::get('english', 'ServersController@rulesEnglish')->name('english');
		// Portuguese Rules Route
		Route::get('portuguese', 'ServersController@rulesPortuguese')->name('portuguese');
		// Spanish Rules Route
		Route::get('spanish', 'ServersController@rulesSpanish')->name('spanish');
		// German Rules Route
		Route::get('german', 'ServersController@rulesGerman')->name('german');
		// Korean Rules Route
		Route::get('korean', 'ServersController@rulesKorean')->name('korean');
		// Japanese Rules Route
		Route::get('japanese', 'ServersController@rulesJapanese')->name('japanese');
		// Index
		Route::get('/', 'ServersController@rulesIndex')->name('index');
	});

	// Servers Status Page
	Route::get('status', 'ServersController@status')->name('status');
});

// Socialite Login
// Route::get('login/discord', 'Auth\LoginController@redirectToProvider')->name('login.discord');
// Route::get('login/discord/callback', 'Auth\LoginController@handleProviderCallback');
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// User Dashboard Routes
// Route::prefix('user')->name('user.')->group(function () {
	// Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
// });