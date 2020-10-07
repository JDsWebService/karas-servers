<?php

namespace App\Http\Middleware;

use App\Handlers\UsersHandler;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfUserIsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // If user is not superAdmin
        if($user->superAdmin == false) {
            // Return To Index
            return redirect()->route('admin.dashboard');
        }

        // Check to see if user is DJRedNight
        if(UsersHandler::isUserWebmaster($user)) {
            return $next($request);
        }

        return $next($request);
    }
}
