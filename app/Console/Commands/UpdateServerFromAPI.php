<?php

namespace App\Console\Commands;

use App\Handlers\ServersHandler;
use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateServerFromAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the oldest server in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Grab the oldest server from the database
        $servers = Server::orderBy('updated_at', 'asc')->take(5)->get();

        // Error Checking
        if($servers->count() == 0) {
            $this->error('No servers in the database!');
            return;
        }
        // Start a progress bar
        $bar = $this->output->createProgressBar(count($servers));

        // Loop through the last 5 servers
        foreach($servers as $server) {
            // Show the server information
            $this->line('Updating server...');
            $this->line('Server Name: ' . $server->name);
            $this->line('Server ID: ' . $server->provider_id);
            $this->line('Server Last Updated At: ' . Carbon::createFromTimeStamp(strtotime($server->updated_at))->diffForHumans());
            // Update the server in the database
            $results = ServersHandler::serverUpdateCommand($server);
            // If successful
            if($results) {
                $this->info('Server has been updated');
            } else {
                $this->warn('Server was not updated successfully');
            }
            $bar->advance();
            $this->line('');
        }

        // Finish Command
        $this->info('Command now finished');
        $bar->finish();
    }
}
