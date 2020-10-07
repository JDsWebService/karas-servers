<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Staff Blade Directive
        Blade::if('staff', function() {
            $user = Auth::user();
            // Check if general user is admin
            if($user->isAdmin == true) {
                return true;
            }
            // Check if user is DJRedNight
            if($user->email == 'djrednightmc@gmail.com' || $user->fullusername == 'DJRedNight#3428') {
                return true;
            }
            // Return false if not staff
            return false;
        });

    }
}
