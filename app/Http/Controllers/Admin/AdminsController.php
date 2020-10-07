<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminsController extends Controller
{
    public function index() {
        $users = User::where('isAdmin', true)->paginate(25);
        return view('admin.users.index')->withUsers($users);
    }

    public function makeSuperAdmin($providerId) {
        $user = User::where('provider_id', $providerId)->first();
        $user->superAdmin = true;
        $user->save();
        Session::flash('success', "User has been given <strong>SUPER</strong> Admin powers!");
        return redirect()->route('admin.users.info', $user->provider_id);
    }

    public function revokeSuperAdmin($providerId) {
        $user = User::where('provider_id', $providerId)->first();
        $user->superAdmin = false;
        $user->save();
        Session::flash('success', "User has been stripped of their Super Admin Powers!");
        return redirect()->route('admin.users.info', $user->provider_id);
    }
}
