<?php

namespace App\Handlers;

use App\Exceptions\ServerException;
use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ServersHandler {

    // Updated the server in the database from the Battlemetrics API
    // Note: Should ONLY be called in the UpdateServerFromAPI Aritsan Command
    public static function serverUpdateCommand(Server $server) {
        // Grab the server info from the database
        $serverInfo = BattlemetricsHandler::getServerInfo($server->provider_id);
        // Populate the server model instance with all data from Battlemetrics API
        $result = self::populateServerInstance($server, $serverInfo);
        // Save the Server Object
        if($result->save()) {
            // Return True If Successful
            return true;
        }
        // Return false if not
        return false;
    }

    // Handle Server Database & Request Logic
    public static function handleServerRequest(Request $request) {
        // Get the server from the database
        $server = self::checkIfServerExists($request);

        // Check BattleMetrics API for Server
        $serverInfo = BattlemetricsHandler::getServerInfo(Purifier::clean($request->provider_id));

        // Populate the server model instance with all data from Battlemetrics API
        $result = self::populateServerInstance($server, $serverInfo);

        // Save the Server Object
        $server->save();

        // Get the correct flash message to send to user
        Session::flash('success', 'Server has been added to the database!');

        return redirect()->route('admin.servers.index');

    }

    private static function populateServerInstance(Server $server, $serverInfo) {
        $server->provider_id = $serverInfo->id;
        $server->name = $serverInfo->name;
        $server->ip = $serverInfo->ip;
        $server->port = $serverInfo->port;
        // Handle Nullable Values
        if(isset($serverInfo->players)) {
            $server->players = $serverInfo->players;
        }
        if(isset($serverInfo->maxPlayers)) {
            $server->maxPlayers = $serverInfo->maxPlayers;
        }
        if(isset($serverInfo->rank)) {
            $server->rank = $serverInfo->rank;
        }
        if(isset($serverInfo->status)) {
            $server->status = $serverInfo->status;
        }
        if(isset($serverInfo->details->map)) {
            $server->map = $serverInfo->details->map;
        }
        if(isset($serverInfo->details->time)) {
            $server->time = $serverInfo->details->time;
        }
        if(isset($serverInfo->details->pve)) {
            $server->pve = $serverInfo->details->pve;
        }
        if(isset($serverInfo->details->modded)) {
            $server->modded = $serverInfo->details->modded;
        }
        if(isset($serverInfo->details->crossplay)) {
            $server->crossplay = $serverInfo->details->crossplay;
        }
        if(isset($serverInfo->private)) {
            $server->private = $serverInfo->private;
        }
        $server->computedCluster = self::getServerCluster($server);
        // Set the Updated At Column Manually
        // $server->updated_at = Carbon::now();
        // Handle if Modded is set or not
        return $server;
    }

    private static function getServerCluster(Server $server) {
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

        // If all else fails or it does not categorize correctly throw an error
        Session::flash('warning', 'ServersHandler@getServerCluster - Unable to determine server cluster. Adding default value.');
        return 'PvE';
    }

    private static function checkIfServerExists(Request $request) {
        // Grab Server From Database
        $server = Server::where('provider_id', Purifier::clean($request->provider_id))->first();

        // If a server was returned
        if($server != null) {
            // Server exists already!
            throw new ServerException('ServersHandler@checkIfServerExists - Server is already in the database.');
        }

        // If server is null, which it should be, return new server
        return new Server;
    }

    public static function deleteServer($provider_id) {
        $server = Server::where('provider_id', $provider_id)->first();

        if($server->delete()) {
            Session::flash('success', 'Server has been deleted successfully!');
        } else {
            throw new ServerException('ServersHandler@deleteServer - Something went wrong when deleting the server.');
        }
    }

}
