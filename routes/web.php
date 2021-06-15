<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('app.pages.index');
})->name('index');

// Socialite Login
Route::get('login/discord', [LoginController::class, 'redirectToProvider'])
        ->name('login.discord');
Route::get('login/discord/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Blog Management Routes
//    Route::prefix('blog')->name('blog.')->group(function () {
//        Route::get('create', 'Admin\BlogController@create')->name('create');
//        Route::post('create', 'Admin\BlogController@store')->name('store');
//        Route::get('edit/{slug}', 'Admin\BlogController@edit')->name('edit');
//        Route::post('update/{slug}', 'Admin\BlogController@update')->name('update');
//        Route::post('delete/{slug}', 'Admin\BlogController@destroy')->name('delete');
//        Route::get('/', 'Admin\BlogController@index')->name('index');
//    });

});
