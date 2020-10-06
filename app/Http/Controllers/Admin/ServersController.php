<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\BattlemetricsHandler;
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
        $this->handleServerRequest($request);

    	return redirect()->route('admin.servers.index');
    }

    // Delete Server
    public function deleteServer($provider_id) {
        $server = Server::where('provider_id', $provider_id)->first();

        if($server->delete()) {
            Session::flash('success', 'Server has been deleted successfully!');
        } else {
            Session::flash('danger', 'Something went wrong when deleting the server');
        }

        return redirect()->route('admin.servers.index');
    }

    // Handle Server Database & Request Logic
    protected function handleServerRequest(Request $request) {
        // Get the server from the database
        $server = $this->checkIfServerExists($request);

        // If Server is false, something went wrong while getting the server from the database
        if(!$server) {
            return redirect()->route('admin.servers.index');
        }

    	// Check BattleMetrics API for Server
    	$serverInfo = BattlemetricsHandler::getServerInfo(Purifier::clean($request->provider_id));

    	// Populate the server model instance with all data from Battlemetrics API
    	$result = $this->populateServerInstance($server, $serverInfo);

        // Save the Server Object
        $server->save();

        // Get the correct flash message to send to user
        Session::flash('success', 'Server has been added to the database!');

        return redirect()->route('admin.servers.index');

    }

    private function populateServerInstance(Server $server, $serverInfo) {
        $server->provider_id = $serverInfo->id;
        $server->name = $serverInfo->name;
        $server->ip = $serverInfo->ip;
        $server->port = $serverInfo->port;
        $server->players = $serverInfo->players;
        $server->maxPlayers = $serverInfo->maxPlayers;
        $server->rank = $serverInfo->rank;
        $server->status = $serverInfo->status;
        $server->map = $serverInfo->details->map;
        $server->time = $serverInfo->details->time;
        $server->pve = $serverInfo->details->pve;
        $server->modded = $serverInfo->details->modded;
        $server->crossplay = $serverInfo->details->crossplay;
        $server->private = $serverInfo->private;
        $server->computedCluster = $this->getServerCluster($server);

        return $server;
    }

    private function getServerCluster(Server $server) {
        // Super Modded
        if($server->pve && $server->modded && !$server->crossplay) {
            return 'Super Modded';
        }
        // PvE
        if($server->pve && $server->crossplay) {
            return 'PvE';
        }
        // PvP
        if(!$server->pve) {
            return 'PvP';
        }
    }

    private function checkIfServerExists(Request $request) {
        // Grab Server From Database
        $server = Server::where('provider_id', Purifier::clean($request->provider_id))->first();

        // If a server was returned
        if($server != null) {
            // Server exists already!
            Session::flash('warning', 'Server was already added to the database. Delete server instead?');
            return false;
        }

        // If server is null, which it should be, return new server
        return new Server;
    }

}
