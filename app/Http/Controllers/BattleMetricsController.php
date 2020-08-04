<?php

namespace App\Http\Controllers;

use App\Exceptions\BattleMetricsException;
use Illuminate\Http\Request;
use \GuzzleHttp\Client as Guzzle;
use \GuzzleHttp\Exception\ClientException;

class BattleMetricsController extends Controller
{
    // Get Server Information From Battlemetrics API
    public static function getServerInfo($id) {

    	$client = new Guzzle(['verify' => false]);
        
        try {
            $response = $client->get('https://api.battlemetrics.com/servers/' . $id);
            if($response->getStatusCode() == 200) {
                $serverInfo = json_decode($response->getBody()->getContents())->data->attributes;
            }
            return $serverInfo;
        } catch (ClientException $e) {
            // If request came back OK
            if($e->getResponse()->getStatusCode() == 429) {
                throw new BattleMetricsException('Err: BattleMetrics API - 429 Too Many Requests');
            } else {
                throw new BattleMetricsException('Err: BattleMetrics API - Generic Error No Code Given');
            }
        }
    }
}
