<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scripts\Ping;

class AdminsController extends Controller
{
    // Dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }

    // Ping Test
    public function pingtest() {
        $test = new Ping;
        $test->setHost('71.181.1.86');
        $test->setPort(16070);
        $latency = $test->ping();
        dd($latency);
    }
}
