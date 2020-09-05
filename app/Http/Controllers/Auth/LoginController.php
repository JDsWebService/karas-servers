<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('discord')->redirect();
    }

    /**
     * Obtain the user information from discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $discordUser = Socialite::driver('discord')
                            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                            ->stateless()
                            ->user();

        // See if User already exists in database
        $user = User::where([
            ['provider_id', '=', $discordUser->user['id']]
        ])->first();

        // If user doesn't exist
        if($user === null) {
            // Add User To Database
            $user = new User;
            $user->provider = 'discord';
            $user->provider_id = $discordUser->user['id'];
            $user->username = $discordUser->user['username'];
            $user->discriminator = $discordUser->user['discriminator'];
            $user->fullusername = $discordUser->nickname;
            $user->avatar = $discordUser->avatar;
            $user->email = $discordUser->user['email'];
            $user->email_verified = $discordUser->user['verified'];
            $user->locale = $discordUser->user['locale'];
            $user->twofactor = $discordUser->user['mfa_enabled'];
            $user->save();
        } else {
            // Update the Users Information
            $user->username = $discordUser->user['username'];
            $user->discriminator = $discordUser->user['discriminator'];
            $user->fullusername = $discordUser->nickname;
            $user->avatar = $discordUser->avatar;
            $user->email = $discordUser->user['email'];
            $user->email_verified = $discordUser->user['verified'];
            $user->locale = $discordUser->user['locale'];
            $user->twofactor = $discordUser->user['mfa_enabled'];
            $user->save();
        }

        Auth::login($user, true);

        $this->isUserStaff($user);

        // dd(Auth::user());

        return redirect()->route('index');

    }

    // Check to see if user is Staff
    protected function isUserStaff($user) {

        // Define List of Staff
        $staff = [
            'DJRedNight#3428',
            'AshleyLee#1988',
            'gucci#8387'
        ];
        // Check if logged in user is in staff array
        if(in_array($user->fullusername, $staff)) {
            // Create a session variable to be used by Blade Directive
            // Ref: AppServiceProvider.php
            Session::put('isStaff', true);
            return true;
        }

        return false;

    }

    public function logout() {
        Auth::logout();
        Session::forget('isStaff');
        Session::flush();
        return redirect()->route('index');
    }
}
