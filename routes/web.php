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
// Coming Soon Route
// Route::get('/', 'PagesController@comingsoon')->name('index');

Route::get('/comingsoon', 'PagesController@comingsoon')->name('comingsoon');

Auth::routes();

Route::prefix('user')->name('user.')->group(function () {
	Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
});