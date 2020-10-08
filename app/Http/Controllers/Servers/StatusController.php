<?php

namespace App\Http\Controllers\Servers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    // Public Facing Server Status Page
    public function status() {
        $servers = Server::orderBy('status', 'desc')->orderBy('computedCluster', 'desc')->orderBy('name')->get();

        // Error Handling
        if($servers->count() == 0) {
            Session::flash('warning', "We haven't added any servers yet. Let an admin know about it!");
            return redirect()->back();
        }

        $clusters = Server::select('computedCluster')->groupBy('computedCluster')->get();

        return view('servers.status')
                            ->withServers($servers)
                            ->withClusters($clusters);
    }
}
