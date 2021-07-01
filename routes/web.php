<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SingletonPagesController;
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

Route::get('/', [SingletonPagesController::class, 'index'])->name('index');

Route::get('/hosting', function () {
    return view('app-hosting.pages.index');
});

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

});
