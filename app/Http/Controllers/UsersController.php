<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // User Dashboard
    public function dashboard() {
        $user = Auth::user();
        // Grab the servers from the database
        $servers = Server::all();
        $serversArray = [];
        foreach($servers as $server) {
            $id = $server->id;
            $name = $server->name;
            $serversArray[$id] = $name;
        }
        // Grab the process of the user profile
        $progress = self::getUserProfileProgress($user);
        
        // return view('pages.404');
    	return view('user.dashboard')
                                ->withUser($user)
                                ->withServersArray($serversArray)
                                ->withProgress($progress);
    }

    // Update the users profile
    public function update(Request $request) {
        $user = Auth::user();
        
        $validationArray = self::getValidationArray($request, $user);
        
        $this->validate($request, $validationArray);

        $user->steam_id = Purifier::clean($request->steam_id);
        $user->epic_id = Purifier::clean($request->epic_id);
        $user->youtube_url = Purifier::clean($request->youtube_url);
        $user->twitch_url = Purifier::clean($request->twitch_url);
        $user->facebook_url = Purifier::clean($request->facebook_url);
        $user->battlemetrics_url = Purifier::clean($request->battlemetrics_url);
        $user->tribe_name = Purifier::clean($request->tribe_name);
        $user->tribe_rank = Purifier::clean($request->tribe_rank);
        $user->bio = Purifier::clean($request->bio);

        
        if($request->favorite_server_id == null) {
            $user->favorite_server_id = $request->favorite_server_id;
        } else {
            $user->favorite_server_id = Purifier::clean($request->favorite_server_id);
        }
        if($request->home_server_id == null) {
            $user->home_server_id = $request->home_server_id;
        } else {
            $user->home_server_id = Purifier::clean($request->home_server_id);
        }


        $user->save();

        Session::flash('success', 'Profile has been save successfully!');

        return redirect()->route('user.dashboard');
    }

    // Get the validation array to be used by the update method
    protected static function getValidationArray($request, $user) {
        $array = [
            // Unique Values
            'steam_id' => 'nullable|string|max:255',
            'epic_id' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255|url',
            'twitch_url' => 'nullable|string|max:255|url',
            'facebook_url' => 'nullable|string|max:255|url',
            'battlemetrics_url' => 'nullable|string|max:255|url',
            // Non-unique Values
            'favorite_server_id' => 'nullable|integer',
            'home_server_id' => 'nullable|integer',
            'tribe_name' => 'nullable|string|max:255',
            'tribe_rank' => 'nullable|string',
            'bio' => 'nullable|max:2500'
        ];
        // Steam ID
        if($request->steam_id != $user->steam_id) {
            $array['steam_id'] = 'nullable|string|max:255|unique:users';
        }
        // Epic Games ID
        if($request->epic_id != $user->epic_id) {
            $array['epic_id'] = 'nullable|string|max:255|unique:users';
        }
        // Urls
        if($request->youtube_url != $user->youtube_url) {
            $array['youtube_url'] = 'nullable|string|max:255|unique:users|url';
        }
        if($request->twitch_url != $user->twitch_url) {
            $array['twitch_url'] = 'nullable|string|max:255|unique:users|url';
        }
        if($request->facebook_url != $user->facebook_url) {
            $array['facebook_url'] = 'nullable|string|max:255|unique:users|url';
        }
        if($request->battlemetrics_url != $user->battlemetrics_url) {
            $array['battlemetrics_url'] = 'nullable|string|max:255|unique:users|url';
        }

        return $array;
    }

    // Get the user's profile progress
    protected static function getUserProfileProgress($user) {
        $array = [];
        // If set to false, profile section has not been completed
        $array['external'] = false;
        $array['social_media'] = false;
        $array['server'] = false;
        $array['tribe'] = false;
        $array['bio'] = false;
        $progress = 0;
        // External Profiles Progress
        if($user->steam_id != null || $user->epic_id != null) {
            $progress += 1;
            $array['external'] = true;
        }
        // Social Media Progress
        if($user->youtube_url != null || $user->twitch_url != null || $user->facebook_url != null || $user->battlemetrics_url != null) {
            $progress += 1;
            $array['social_media'] = true;
        }
        // Servers Progress
        if($user->favorite_server_id != null && $user->home_server_id != null) {
            $progress += 1;
            $array['server'] = true;
        }
        // Tribe Information Progress
        if($user->tribe_name != null && $user->tribe_rank != null) {
            $progress += 1;
            $array['tribe'] = true;
        }
        // Bio Progress
        if($user->bio != null) {
            $progress += 1;
            $array['bio'] = true;
        }

        switch($progress) {
            case 1:
                $array['percentage'] = '20';
                break;
            case 2:
                $array['percentage'] = '40';
                break;
            case 3:
                $array['percentage'] = '60';
                break;
            case 4:
                $array['percentage'] = '80';
                break;
            case 5:
                $array['percentage'] = '100';
                break;
            default:
                $array['percentage'] = '0';
                break;
        }

        return (object) $array;
    }
}
