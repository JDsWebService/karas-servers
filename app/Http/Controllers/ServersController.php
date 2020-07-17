<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Scripts\Ping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \GuzzleHttp\Client as Guzzle;

class ServersController extends Controller
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
    	return view('servers.add');
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
    	} else {
    		Session::flash('danger', 'Server already in database.');
    	}
    	

    	return redirect()->route('servers.add');
    }

    // Public Facing Server List
    public function list() {

    }


    // Get Server Information From Battlemetrics API
    protected function getServerInfo($id) {
    	$client = new Guzzle(['verify' => false]);
    	$response = $client->get('https://api.battlemetrics.com/servers/' . $id);
    	
    	// If request came back OK
    	if($response->getStatusCode() == 200) {
    		$serverInfo = json_decode($response->getBody()->getContents())->data->attributes;
    	} else {
    		throw new Exception('Response Code Not 200, Try Request Again');
    	}

    	return $serverInfo;
    }
}
