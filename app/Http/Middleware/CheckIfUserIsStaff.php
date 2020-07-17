<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        $staff = [
            'DJRedNight#3428',
            'AshleyLee#1988',
        ];
        $user = Auth::user();
        if(!in_array($user->fullusername, $staff)) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
