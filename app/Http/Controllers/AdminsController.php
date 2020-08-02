<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client as Guzzle;
use App\Scripts\Ping;
use App\Models\Server;
use Illuminate\Support\Facades\Session;


class AdminsController extends Controller
{
    // Ping Test
    public function pingtest() {
    	$test = new Ping;
    	$test->setHost('71.181.1.86');
    	$test->setPort(16070);
    	$latency = $test->ping();
    	dd($latency);
    }

    // Admin Add Server Page
    public function addServer() {
    	return view('admin.servers.add');
    }

    // Admin Store Server
    public function storeServer(Request $request) {
    	$serverInfo = $this->getServerInfo($request->provider_id);

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
    	}
    	
    	Session::flash('danger', 'Server already in database.');
    	
    	return redirect()->route('admin.servers.add');
    }
}
