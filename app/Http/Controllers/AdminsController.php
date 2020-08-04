<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Server;
use App\Models\User;
use App\Scripts\Ping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    // Dashboard
    public function dashboard() {
        // Statistics Counts
        $userCount                  = User::all()->count();
        $postCount                  = Post::all()->count();
        $serverCount                = Server::all()->count();
        
        $date = Carbon::now()->subDays(6);

        // lists() does not accept raw queries,
        // so you have to specify the SELECT clause
        $days = User::select(array(
                DB::raw('DATE(`created_at`) as `date`'),
                DB::raw('COUNT(*) as `count`')
            ))
            ->where('created_at', '>', $date)
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->pluck('count', 'date');

        $data = [];

        // Notice lists returns an associative array with its second and
        // optional param as the key, and the first param as the value
        foreach ($days as $date => $count) {
            array_push($data, ['date' => $date, 'count' => $count]);
        }

        return view('admin.dashboard')
                                ->withUserCount($userCount)
                                ->withPostCount($postCount)
                                ->withServerCount($serverCount)
                                ->withUserStats($data);
    }

    // Ping Test
    public function pingtest() {
        $test = new Ping;
        $test->setHost('71.181.1.86');
        $test->setPort(16070);
        $latency = $test->ping();
        dd($latency);
    }
}
