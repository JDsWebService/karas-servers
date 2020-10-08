<?php

namespace App\Console\Commands;

use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeServersUpdatedAtToNow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:changetime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change Time Of Updated At Field on All Servers To Now';

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
        $servers = Server::all();
        foreach($servers as $server) {
            $this->info('Changing Server Time of Server: ' . $server->name);
            $server->updated_at = Carbon::now();
            $server->save();
            $this->info('Time Changed!');
        }
    }
}
