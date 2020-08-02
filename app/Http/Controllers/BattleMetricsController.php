<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client as Guzzle;

class BattleMetricsController extends Controller
{
    // Get Server Information From Battlemetrics API
    public static function getServerInfo($id) {
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
