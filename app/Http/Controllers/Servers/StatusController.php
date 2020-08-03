<?php

namespace App\Http\Controllers\Servers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Public Facing Server Status Page
    public function status() {
        return view('servers.status');
    }
}
