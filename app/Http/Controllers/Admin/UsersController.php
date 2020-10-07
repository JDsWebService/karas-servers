<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index() {
        $users = User::orderBy('username', 'desc')->paginate(20);
        return view('admin.users.index')->withUsers($users);
    }

    public function info($providerId) {
        $user = User::where('provider_id', $providerId)->first();
        return view('admin.users.info')->withUser($user);
    }

    public function getBio($providerId) {
        $user = User::select('provider_id', 'bio', 'username')->where('provider_id', $providerId)->first();
        if($user->bio == null) {
            Session::flash('warning', 'User has no bio in the Database');
            return redirect()->route('admin.users.info', $user->provider_id);
        }
        return view('admin.users.bio')->withUser($user);
    }

    public function makeAdmin($providerId) {
        $user = User::where('provider_id', $providerId)->first();
        $user->isAdmin = true;
        $user->save();
        Session::flash('success', 'User has been given admin powers!');
        return redirect()->route('admin.users.info', $user->provider_id);
    }

    public function revokeAdmin($providerId) {
        $user = User::where('provider_id', $providerId)->first();
        $user->isAdmin = false;
        $user->save();
        Session::flash('success', 'User has been stripped of their admin powers!');
        return redirect()->route('admin.users.info', $user->provider_id);
    }
}
