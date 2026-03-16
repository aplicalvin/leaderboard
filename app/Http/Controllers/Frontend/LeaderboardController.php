<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::role('member')
            ->withSum('scoreLogs', 'points')
            ->orderByDesc('score_logs_sum_points')
            ->get()
            ->map(function ($user, $index) {
                $user->rank = $index + 1;
                $user->points = $user->score_logs_sum_points ?? 0;
                $user->avatar = self::getAvatarUrl($user->nim, $user->name);
                return $user;
            });

        $top1 = $users->where('rank', 1)->first();
        $top2 = $users->where('rank', 2)->first();
        $top3 = $users->where('rank', 3)->first();
        $ranks4_plus = $users->skip(3);

        return view('leaderboard', compact('users', 'top1', 'top2', 'top3', 'ranks4_plus'));
    }
}
