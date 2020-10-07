<?php

namespace App\Http\Middleware;

use App\Handlers\UsersHandler;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckIfUserIsStaff
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
        dd($user);
        // If user is not staff
        if($user->isAdmin == false) {
            // Return To Index if not staff
            return redirect()->route('index');
        }

        // Check to see if user is DJRedNight
        if(UsersHandler::isUserWebmaster($user)) {
            return $next($request);
        }

        return $next($request);
    }
}
