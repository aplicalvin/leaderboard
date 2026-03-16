<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = User::role('mentor')
            ->withCount('classes')
            ->paginate(12);

        $mentors->getCollection()->transform(function ($mentor) {
            $mentor->avatar = self::getAvatarUrl($mentor->nim, $mentor->name);
            return $mentor;
        });

        return view('mentor', compact('mentors'));
    }

    public function show($id)
    {
        $mentor = User::role('mentor')
            ->with(['classes'])
            ->withCount('classes')
            ->findOrFail($id);

        $mentor->avatar = self::getAvatarUrl($mentor->nim, $mentor->name);

        return view('mentor-detail', compact('mentor'));
    }
}
