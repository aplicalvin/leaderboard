<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::role('member')
            ->withSum('scoreLogs', 'points')
            ->orderByDesc('score_logs_sum_points')
            ->paginate(16);

        // Transform results with avatar and defaults
        $users->getCollection()->transform(function ($user, $index) use ($users) {
            $user->rank = ($users->currentPage() - 1) * $users->perPage() + $index + 1;
            $user->points = $user->score_logs_sum_points ?? 0;
            $user->avatar = self::getAvatarUrl($user->nim, $user->name);
            return $user;
        });

        // We aren't doing the 1,2,3 highlights on the member index page since it's just a grid/list 
        // Let's pass $users to the view.
        return view('member', compact('users'));
    }

    public function show($username)
    {
        $member = User::role('member')
            ->where('username', $username)
            ->with(['joinedClasses.mentor', 'scoreLogs.task.class'])
            ->withSum('scoreLogs', 'points')
            ->firstOrFail();

        $member->points = $member->score_logs_sum_points ?? 0;
        $member->avatar = self::getAvatarUrl($member->nim, $member->name);
        
        // Let's calculate the user's current rank overall based on total points
        $higherScoreCount = User::role('member')
            ->withSum('scoreLogs', 'points')
            ->having('score_logs_sum_points', '>', $member->points)
            ->count();
            
        $member->rank = $higherScoreCount + 1;

        return view('member-detail', compact('member'));
    }
}
