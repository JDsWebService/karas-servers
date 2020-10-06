<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BattleMetricsController as BMController;
use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ServersController extends Controller
{
    // Admin List Servers
    public function listServers() {
        $servers = Server::orderBy('cluster', 'asc')->orderBy('name', 'asc')->paginate(10);

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

    // Edit Server
    public function editServer($provider_id) {
        $server = Server::where('provider_id', $provider_id)->first();

        return view('admin.servers.edit')
                                ->withServer($server);
    }

    // Update Server
    public function updateServer(Request $request) {

        // Handle Server Database Logic
        $this->handleServerRequest($request, 'update');

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
    protected function handleServerRequest($request, $route = 'store') {
    	// Grab Server From Database
    	$server = Server::where('provider_id', Purifier::clean($request->provider_id))->first();

    	// Figure out what route we're coming from
    	switch($route) {
    		case 'store':
    			// Error Handling
    			if($server != null) {
    				Session::flash('danger', 'Server is already in the database. Update it instead!');
    				return;
    			}
    			// Everything is good to go
    			$server = new Server;
    			$newServer = true;

    			break;
    		case 'update':
    			// Error Handling
    			if($server == null) {
    				Session::flash('danger', 'Server is not in the database. Consider adding it instead!');
    				return;
    			}
    			// Everything is good to go
    			$newServer = false;
    			break;
    		default:
    			Session::flash('danger', 'Something went wrong. Err Code: 1');
    			return;
    	}

    	// Check BattleMetrics API for Server
    	$serverInfo = BMController::getServerInfo(Purifier::clean($request->provider_id));

    	// Assign all the request data to the Server Object
        $server->provider_id = $serverInfo->id;
        $server->name = $serverInfo->name;
        $server->address = $serverInfo->address;
        $server->ip = $serverInfo->ip;
        $server->port = $serverInfo->port;
        $server->portQuery = $serverInfo->portQuery;
        $server->cluster = Purifier::clean($request->cluster);

        // Save the Server Object
        $saveStatus = $server->save();

        // Flash Session Message
      	if($saveStatus == true && $newServer == true) {
        	Session::flash('success', 'Server Added to the Database');
        } elseif ($saveStatus == true && $newServer == false) {
        	Session::flash('success', 'Server Updated In The Database');
        }

    }
}
