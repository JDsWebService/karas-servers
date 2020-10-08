<?php

namespace App\Providers;

use App\Handlers\UsersHandler;
use Illuminate\Support\Facades\Auth;
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

            // Check to see if user is DJRedNight
            if(UsersHandler::isUserWebmaster($user)) {
                return true;
            }

            // Return false if not staff
            return false;
        });

        // Super User Blade Directive
        Blade::if('superAdmin', function() {
           $user = Auth::user();
           if($user->superAdmin == true) {
               return true;
           }
           return false;
        });

    }
}
