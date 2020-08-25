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

// Homepage
Route::get('/', 'PagesController@index')->name('index');
// Route::get('/', 'PagesController@comingsoon')->name('index');

// Public Facing Blog Routes
Route::prefix('blog')->name('blog.')->group(function () {

	Route::get('s/{slug}', 'BlogController@show')->name('show');
	Route::get('/', 'BlogController@index')->name('index');

});

// Single Pages Group
Route::name('pages.')->group(function () {
	// About Us Page
	Route::get('about', 'PagesController@about')->name('about');
	// FAQ Page
	Route::get('faq', 'PagesController@faq')->name('faq');
	// Resources Page
	Route::get('resources', 'PagesController@resources')->name('resources');
});

// Public Facing Server Routes
Route::prefix('servers')->name('servers.')->group(function () {
	// Server Rules
	Route::prefix('rules')->name('rules.')->group(function () {
		// English Rules Route
		Route::get('english', 'Servers\RulesController@rulesEnglish')->name('english');
		// Portuguese Rules Route
		Route::get('portuguese', 'Servers\RulesController@rulesPortuguese')->name('portuguese');
		// Spanish Rules Route
		Route::get('spanish', 'Servers\RulesController@rulesSpanish')->name('spanish');
		// German Rules Route
		Route::get('german', 'Servers\RulesController@rulesGerman')->name('german');
		// Korean Rules Route
		Route::get('korean', 'Servers\RulesController@rulesKorean')->name('korean');
		// Japanese Rules Route
		Route::get('japanese', 'Servers\RulesController@rulesJapanese')->name('japanese');
		// Index
		Route::get('/', 'Servers\RulesController@rulesIndex')->name('index');
	});

	// Servers Status Page
	Route::get('status', 'Servers\StatusController@status')->name('status');
});

// Socialite Login
Route::get('login/discord', 'Auth\LoginController@redirectToProvider')->name('login.discord');
Route::get('login/discord/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// User Dashboard Routes
Route::prefix('user')->name('user.')->group(function () {
	Route::get('dashboard', 'PagesController@whoops')->name('dashboard');
	// Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
	Route::post('dashboard', 'UsersController@update')->name('update');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth.staff', 'auth'])->group(function () {
	// Dashboard
	Route::get('dashboard', 'AdminsController@dashboard')->name('dashboard');
	// Ping Test
	Route::get('ping-test', 'AdminsController@pingtest')->name('ping-test');
	
	// Server Management Routes
	Route::prefix('servers')->name('servers.')->group(function () {
		Route::get('add', 'Admin\ServersController@addServer')->name('add');
		Route::post('add', 'Admin\ServersController@storeServer')->name('store');
		Route::get('edit/{provider_id}', 'Admin\ServersController@editServer')->name('edit');
		Route::post('edit', 'Admin\ServersController@updateServer')->name('update');
		Route::delete('delete/{provider_id}', 'Admin\ServersController@deleteServer')->name('delete');
		Route::get('/', 'Admin\ServersController@listServers')->name('index');
	});

	// Blog Management Routes
	Route::prefix('blog')->name('blog.')->group(function () {
		Route::get('create', 'Admin\BlogController@create')->name('create');
		Route::post('create', 'Admin\BlogController@store')->name('store');
		Route::get('edit/{slug}', 'Admin\BlogController@edit')->name('edit');
		Route::post('update/{slug}', 'Admin\BlogController@update')->name('update');
		Route::post('delete/{slug}', 'Admin\BlogController@destroy')->name('delete');
		Route::get('/', 'Admin\BlogController@index')->name('index');
	});

	// Resources Management
	Route::prefix('resources')->name('resources.')->group(function () {

		// Ingredient Management
		Route::prefix('ingredients')->name('ingredients.')->group(function () {
			Route::get('create', 'Resources\IngredientsController@create')->name('create');
			Route::post('store', 'Resources\IngredientsController@store')->name('store');
			Route::get('edit/{id}', 'Resources\IngredientsController@edit')->name('edit');
			Route::post('edit/{id}', 'Resources\IngredientsController@update')->name('update');
			Route::post('delete/{id}', 'Resources\IngredientsController@destroy')->name('delete');
			Route::get('/', 'Resources\IngredientsController@index')->name('index');
		});

	});
});