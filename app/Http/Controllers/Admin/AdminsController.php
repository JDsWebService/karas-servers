<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index() {
        $users = User::where('isAdmin', true)->paginate(25);
        return view('admin.users.index')->withUsers($users);
    }
}
