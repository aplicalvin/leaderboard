@extends('layouts.app')

@section('title', 'Member Profile - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    <!-- Playful Background Gradients -->
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-indigo-600 via-purple-600 to-fuchsia-500 rounded-b-[3rem] opacity-80 -z-10 blur-sm mask-image-b"></div>
    <div class="absolute top-0 left-0 w-full h-80 bg-gradient-to-r from-indigo-500 via-purple-500 to-fuchsia-500 rounded-b-[3rem] -z-20"></div>

    @php
        // Dummy data for Member Profile
        $member = [
            'name' => 'Alex Chen',
            'nim' => '202310045',
            'avatar' => 'https://ui-avatars.com/api/?name=Alex+Chen&background=random&size=200',
            'is_verified' => true,
            'total_score' => 9850,
            'classes' => [
                [
                    'id' => 1,
                    'name' => 'Advanced Networking',
                    'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=200',
                    'description' => 'Master the concepts of routing, switching, and cloud infrastructure.'
                ],
                [
                    'id' => 2,
                    'name' => 'Cybersecurity Fundamentals',
                    'thumbnail' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=200',
                    'description' => 'Learn the basics of ethical hacking and secure systems design.'
                ]
            ],
            'point_history' => [
                ['task_title' => 'Completed Web Security Module', 'points' => 500, 'time' => '2 hours ago', 'color' => 'text-emerald-400'],
                ['task_title' => 'Weekly Quiz: Networking', 'points' => 150, 'time' => 'Yesterday', 'color' => 'text-violet-400'],
                ['task_title' => 'Hackathon Participation', 'points' => 2000, 'time' => '3 days ago', 'color' => 'text-fuchsia-400'],
                ['task_title' => 'Forum Help Contribution', 'points' => 50, 'time' => '1 week ago', 'color' => 'text-blue-400'],
            ]
        ];
    @endphp

    <!-- Top Profile Section -->
    <div class="relative mt-8">
        <div class="glass-panel rounded-3xl p-8 flex flex-col md:flex-row items-center gap-8 shadow-2xl border-white/20 bg-white/10 backdrop-blur-xl">
            <!-- Avatar -->
            <div class="relative shrink-0 group">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white/50 overflow-hidden shadow-[0_0_30px_rgba(255,255,255,0.3)] transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ $member['avatar'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                </div>
                <!-- Verified Badge -->
                @if($member['is_verified'])
                <div class="absolute bottom-2 right-2 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full p-1.5 border-2 border-white shadow-lg animate-bounce" title="Verified Member">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                @endif
            </div>

            <!-- Basic Info -->
            <div class="flex-grow text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-black text-white mb-2 drop-shadow-md tracking-tight">{{ $member['name'] }}</h1>
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full bg-white/20 text-white text-sm font-semibold tracking-wide backdrop-blur-md border border-white/10">NIM: {{ $member['nim'] }}</span>
                    <span class="px-3 py-1 rounded-full bg-indigo-500/30 text-indigo-100 text-sm font-semibold tracking-wide border border-indigo-400/30">Member</span>
                </div>
            </div>

            <!-- Total Score & Rank Cards -->
            <div class="shrink-0 w-full md:w-auto flex flex-col sm:flex-row gap-4">
                <!-- Rank Card -->
                <div class="bg-gradient-to-br from-indigo-500/20 to-purple-500/5 border border-indigo-400/20 rounded-2xl p-6 text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_10px_40px_rgba(99,102,241,0.4)] relative overflow-hidden group min-w-[140px]">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_ease-in-out]"></div>
                    <div class="text-5xl mb-2 flex justify-center drop-shadow-lg transform transition-transform group-hover:scale-110">👑</div>
                    <div class="text-white/80 text-sm font-bold uppercase tracking-widest mb-1">Global Rank</div>
                    <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-neon-blue to-indigo-300 drop-shadow-md tabular-nums">
                        #1
                    </div>
                </div>

                <!-- Total Score Card -->
                <div class="bg-gradient-to-br from-white/20 to-white/5 border border-white/20 rounded-2xl p-6 text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_10px_40px_rgba(168,85,247,0.4)] relative overflow-hidden group min-w-[140px]">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_ease-in-out]"></div>
                    <div class="text-5xl mb-2 flex justify-center drop-shadow-lg transform transition-transform group-hover:scale-110">🏆</div>
                    <div class="text-white/80 text-sm font-bold uppercase tracking-widest mb-1">Total Score</div>
                    <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-amber-300 to-yellow-500 drop-shadow-md tabular-nums">
                        {{ number_format($member['total_score']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content: Two Columns -->
    <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Column 1: Enrolled Classes -->
        <div class="space-y-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-indigo-500/20 rounded-lg text-indigo-400 shadow-[0_0_15px_rgba(99,102,241,0.3)] border border-indigo-500/30">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white tracking-tight drop-shadow-sm">Enrolled Classes</h2>
            </div>
            
            <div class="space-y-4">
                @forelse($member['classes'] as $class)
                <div class="glass-panel p-4 rounded-2xl flex items-center gap-5 transition-all duration-300 hover:bg-white/10 hover:-translate-y-1 hover:shadow-xl group cursor-pointer border border-white/5 hover:border-indigo-400/50">
                    <div class="w-20 h-20 shrink-0 rounded-xl overflow-hidden relative shadow-lg">
                        <div class="absolute inset-0 bg-indigo-500/20 mix-blend-overlay group-hover:opacity-0 transition-opacity"></div>
                        <img src="{{ $class['thumbnail'] }}" alt="{{ $class['name'] }}" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-lg font-bold text-white mb-1 group-hover:text-indigo-300 transition-colors">{{ $class['name'] }}</h3>
                        <p class="text-sm text-gray-400 line-clamp-2 leading-relaxed">{{ $class['description'] }}</p>
                    </div>
                    <div class="shrink-0 p-2 text-indigo-400 opacity-0 group-hover:opacity-100 transition-opacity transform translate-x-4 group-hover:translate-x-0 duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
                @empty
                <div class="glass-panel rounded-2xl p-8 text-center border-dashed border-2 border-white/10">
                    <p class="text-gray-400 font-medium">Not enrolled in any classes yet.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Column 2: Point History -->
        <div class="space-y-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-purple-500/20 rounded-lg text-purple-400 shadow-[0_0_15px_rgba(168,85,247,0.3)] border border-purple-500/30">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white tracking-tight drop-shadow-sm">Point History</h2>
            </div>
            
            <div class="glass-panel rounded-2xl p-6 border border-white/5 relative overflow-hidden shadow-xl">
                <!-- Subtle background decoration -->
                <div class="absolute right-0 top-0 w-40 h-40 bg-purple-500/10 blur-[60px] rounded-full pointer-events-none"></div>
                <div class="absolute left-0 bottom-0 w-40 h-40 bg-indigo-500/10 blur-[60px] rounded-full pointer-events-none"></div>
                
                <div class="relative z-10 space-y-4">
                    @forelse($member['point_history'] as $history)
                    <div class="group flex items-center justify-between p-3 rounded-xl hover:bg-white/5 transition-colors border border-transparent hover:border-white/10">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white/50 group-hover:bg-[var(--tw-gradient-from)] group-hover:text-white transition-colors border border-white/5 hover:border-white/20">
                                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold group-hover:text-purple-300 transition-colors">{{ $history['task_title'] }}</h4>
                                <p class="text-xs text-gray-500 mt-1 font-medium">{{ $history['time'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-lg font-black {{ $history['color'] }} drop-shadow-sm group-hover:scale-110 inline-block transition-transform">+{{ number_format($history['points']) }}</span>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block mt-0.5">pts</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <p class="text-gray-400 font-medium text-sm">No points history available.</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <button class="w-full mt-4 py-3.5 rounded-xl bg-gradient-to-r from-indigo-500/10 to-purple-500/10 hover:from-indigo-500/20 hover:to-purple-500/20 border border-indigo-500/30 text-indigo-300 font-bold tracking-wide transition-all duration-300 hover:shadow-[0_0_20px_rgba(99,102,241,0.2)] hover:border-indigo-400/50 flex items-center justify-center gap-2 group">
                View Full History
                <svg class="w-4 h-4 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
        
    </div>
</div>

@push('styles')
<style>
    /* Add extra animation specific for member profile */
    @keyframes shine {
        100% { transform: translateX(200%); }
    }
</style>
@endpush
@endsection
