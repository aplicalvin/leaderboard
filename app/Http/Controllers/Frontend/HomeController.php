<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;

class HomeController extends Controller
{
    public function index()
    {
        // Top 10 Members by Score
        $users = User::role('member')
            ->withSum('scoreLogs', 'points')
            ->orderByDesc('score_logs_sum_points')
            ->take(10)
            ->get()
            ->map(function ($user, $index) {
                $user->rank = $index + 1;
                $user->points = $user->score_logs_sum_points ?? 0;
                $user->avatar = self::getAvatarUrl($user->nim, $user->name);
                return $user;
            });
            
        // Top 3 for Podium
        $top1 = $users->where('rank', 1)->first();
        $top2 = $users->where('rank', 2)->first();
        $top3 = $users->where('rank', 3)->first();

        // Mentors Preview
        $mentors = User::role('mentor')
            ->withCount('classes')
            ->take(4)
            ->get()
            ->map(function ($mentor) {
                $mentor->avatar = self::getAvatarUrl($mentor->nim, $mentor->name);
                return $mentor;
            });

        // Classes Preview
        $classes = ClassModel::with('mentor')->take(3)->get();

        return view('welcome', compact('users', 'top1', 'top2', 'top3', 'mentors', 'classes'));
    }
}
