<?php

use App\Http\Controllers\BattleMetricsController;
use App\Models\Server;
use Illuminate\Database\Seeder;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $server = Server::first();

        if($server != null) {
            $this->command->alert('ERROR: SeversTableSeeder detected servers in the database. Skipping this seeder!');
        } else {
            // Define Kara's Servers in Array Form
        	$serversArray = [
				['provider_id' => '7343492', 'cluster' => 'pve'],
				['provider_id' => '7259982', 'cluster' => 'pve'],
				['provider_id' => '7354987', 'cluster' => 'pve'],
				['provider_id' => '7343491', 'cluster' => 'pve'],
				['provider_id' => '7272873', 'cluster' => 'pve'],
				['provider_id' => '7274533', 'cluster' => 'pve'],
				['provider_id' => '7274485', 'cluster' => 'pve'],
				['provider_id' => '7365342', 'cluster' => 'pve'],
				['provider_id' => '7279772', 'cluster' => 'pve'],
				['provider_id' => '7365341', 'cluster' => 'pve'],
				['provider_id' => '7366033', 'cluster' => 'pve'],
				['provider_id' => '7425881', 'cluster' => 'pve'],
				['provider_id' => '7314119', 'cluster' => 'pve'],
				['provider_id' => '7279773', 'cluster' => 'pve'],
				['provider_id' => '7271963', 'cluster' => 'pve'],
				['provider_id' => '7398588', 'cluster' => 'pvp'],
				['provider_id' => '7279314', 'cluster' => 'pvp'],
				['provider_id' => '7398685', 'cluster' => 'pvp'],
				['provider_id' => '3839516', 'cluster' => 'modded'],
				['provider_id' => '3839515', 'cluster' => 'modded'],
				['provider_id' => '6468628', 'cluster' => 'modded'],
				['provider_id' => '5795842', 'cluster' => 'modded'],
				['provider_id' => '5903394', 'cluster' => 'modded'],
				['provider_id' => '3839518', 'cluster' => 'modded'],
				['provider_id' => '7272874', 'cluster' => 'other'],
				['provider_id' => '3839517', 'cluster' => 'modded']
        	];

        	// Loop through the array
        	foreach($serversArray as $server) {
                // Grab server information from BattleMetrics
        		$serverInfo = BattleMetricsController::getServerInfo($server['provider_id']);

        		// Create New Server
        		$newServer = new Server;
    			// Assign all the server data from BattleMetrics to the Server Object
    		    $newServer->address = $serverInfo->address;
    		    $newServer->cluster = $server['cluster'];
    		    $newServer->ip = $serverInfo->ip;
    		    $newServer->name = $serverInfo->name;
    		    $newServer->port = $serverInfo->port;
    		    $newServer->portQuery = $serverInfo->portQuery;
    		    $newServer->provider_id = $serverInfo->id;

    		    // Save the Server Object
    		    if($newServer->save()) {
                    // Let the user know that the server was added!
                    $this->command->info("Server Added: {$newServer->provider_id}");
                }
        	}

        }
    }
}
