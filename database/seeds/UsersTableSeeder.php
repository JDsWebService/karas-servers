<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // See if DJRedNight is in the Database
    	$user = User::where('provider_id', '575805961315287061')->first();
        // Check to see if the entry is NULL
    	if($user == null) {
            $this->command->info("The database is empty! Creating DJRedNight's profile now");
            $this->createDefaultProfile();
    	} else {
    		$this->command->warn("ERROR: DJRedNight already in the database. Skipping over default profile creation.");
    	}
        // Seed the rest of the database using the factory
        factory(User::class, 500)->create();
    }

    // Create the Default Profile for DJRedNight
    protected function createDefaultProfile() {
        // Create new User object
        $user = new User;
        // Handle the data
        $user->provider = 'discord';
        $user->provider_id = "575805961315287061";
        $user->username = "DJRedNight";
        $user->discriminator = "3428";
        $user->fullusername = "DJRedNight#3428";
        $user->avatar = "https://cdn.discordapp.com/avatars/575805961315287061/bf64b1ef6af2d253d7c1563e8f8095ad.jpg";
        $user->email = "jdswebservice@gmail.com";
        $user->email_verified = 1;
        $user->locale = "en-US";
        $user->twofactor = 0;
        $user->remember_token = "NsFrd6EtnF46g4kMm14XwJxwjfVg5s7Os72q6mrJm6RroQrdXOYG7LdMP8r6";
        
        // If the user object saves correctly
        if($user->save()) {
            $this->command->info('Default User Profile has been added to the database.');
        } else {
            $this->command->alert('ERROR: UsersTableSeeder was unable to create default profile.');
        }
    }
}
