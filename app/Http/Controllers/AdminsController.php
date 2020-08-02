<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scripts\Ping;
use App\Models\Server;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BattleMetricsController as BMController;


class AdminsController extends Controller
{
    // Dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }

    // Admin List Servers
    public function listServers() {
        $servers = Server::orderBy('cluster', 'asc')->orderBy('name', 'asc')->paginate(10);

        return view('admin.servers.index')
                                ->withServers($servers);
    }

    // Admin Add Server Page
    public function addServer() {
    	return view('admin.servers.add');
    }
    
    // Admin Store Server
    public function storeServer(Request $request) {

        $serverInfo = BMController::getServerInfo($request);
        
    	// Check if Server Is In Database
    	$server = Server::where('provider_id', $request->provider_id)->first();
    	if($server === null) {
    		$server = new Server;
    		$server->provider_id = $serverInfo->id;
    		$server->name = $serverInfo->name;
    		$server->address = $serverInfo->address;
    		$server->ip = $serverInfo->ip;
    		$server->port = $serverInfo->port;
    		$server->portQuery = $serverInfo->portQuery;
    		$server->cluster = $request->cluster;

    		$server->save();

    		Session::flash('success', 'Server Added To Database');	
    	} else {
    	   Session::flash('danger', 'Server already in database.');
        }
    	
    	
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
        $serverInfo = BMController::getServerInfo($request->provider_id);

        // Check if Server Is In Database
        $server = Server::where('provider_id', $request->provider_id)->first();
        if($server != null) {
            $server->provider_id = $serverInfo->id;
            $server->name = $serverInfo->name;
            $server->address = $serverInfo->address;
            $server->ip = $serverInfo->ip;
            $server->port = $serverInfo->port;
            $server->portQuery = $serverInfo->portQuery;
            $server->cluster = $request->cluster;

            $server->save();

            Session::flash('success', 'Server Information Saved To The Database');
        } else {
           Session::flash('danger', 'Something went wrong when saving the server information.');
        }
        
        
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


    // Ping Test
    public function pingtest() {
        $test = new Ping;
        $test->setHost('71.181.1.86');
        $test->setPort(16070);
        $latency = $test->ping();
        dd($latency);
    }
}
