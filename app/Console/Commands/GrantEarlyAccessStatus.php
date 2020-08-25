<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GrantEarlyAccessStatus extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:grantearlyaccess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Modifies the Users Model to grant the Early Access Status';

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
        // Display Info To User Running Command
        $this->info('Date & Time: ' . Carbon::now());
        $this->alert('Updating Users Table');
        
        // Grab all users from the time the command is run
        $users = User::all();

        // Create a progress bar
        $bar = $this->output->createProgressBar(count($users));
        $bar->setFormat(' %current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%');
        $bar->start();

        // Loop Through Each User
        foreach($users as $user) {
            // Set User to Early Access Member
            $user->early_access_member = true;
            // Save The User
            $user->save();
            // Advance The Progress Bar
            $bar->advance();
        }
        // Complete The Progress Bar
        $bar->finish();
    }
}
