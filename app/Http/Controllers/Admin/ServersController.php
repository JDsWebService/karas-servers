<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\BattlemetricsHandler;
use App\Handlers\ServersHandler;
use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ServersController extends Controller
{
    // Admin List Servers
    public function listServers() {
        $servers = Server::orderBy('computedCluster', 'asc')->orderBy('name', 'asc')->paginate(10);

        if($servers->count() == 0) {
            Session::flash('warning', 'No Servers Are In The Database. You need to create one first!');
            return redirect()->route('admin.servers.add');
        }
        return view('admin.servers.index')
                                ->withServers($servers);
    }

    // Admin Add Server Page
    public function addServer() {
    	return view('admin.servers.add');
    }

    // Admin Store Server
    public function storeServer(Request $request) {
    	// Handle Server Database Logic
        ServersHandler::handleServerRequest($request);

    	return redirect()->route('admin.servers.index');
    }

    // Delete Server
    public function deleteServer($provider_id) {
        ServersHandler::deleteServer($provider_id);

        return redirect()->route('admin.servers.index');
    }
}
