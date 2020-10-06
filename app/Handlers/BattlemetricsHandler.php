<?php

namespace App\Handlers;

use App\Exceptions\BattleMetricsException;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;

class BattlemetricsHandler {

    protected static $serverInfo;

    /**
     * Get Server Information From Battlemetrics API
     *
     * @param $id
     * @return mixed
     * @throws BattleMetricsException
     */
    public static function getServerInfo($id) {

        $client = new Guzzle(['verify' => false]);

        try {
            $response = $client->get('https://api.battlemetrics.com/servers/' . $id);
            if($response->getStatusCode() == 200) {
                // Define the Server Info Variable
                self::$serverInfo = json_decode($response->getBody()->getContents())->data;

                // Check to make sure the server is an Ark Server
                self::checkServerType();
            }
            return self::$serverInfo->attributes;
        } catch (ClientException $e) {
            // If request came back OK
            if($e->getResponse()->getStatusCode() == 429) {
                throw new BattleMetricsException('Err: BattleMetrics API - 429 Too Many Requests');
            } else {
                throw new BattleMetricsException('Err: BattleMetrics API - Generic Error No Code Given');
            }
        }
    }

    private static function checkServerType() {
        if(self::$serverInfo->relationships->game->data->id != "ark") {
            throw new BattleMetricsException('Err: Given Provider ID is not of Game Type: ARK');
        }
        return true;
    }

}
