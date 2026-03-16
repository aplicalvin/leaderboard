@extends('layouts.app')

@section('title', 'Home - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Hero Section / Title -->
    <div class="text-center mb-16 relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-neon-blue/20 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-6 drop-shadow-lg">
            DNCC Leaderboard for <br>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-neon-blue to-purple-500">Upskilling Session</span>
        </h1>
        <p class="text-lg text-gray-400 max-w-2xl mx-auto font-medium">Track your progress, explore exciting classes, and learn from our expert mentors to level up your skills.</p>
    </div>

    <!-- Section: Top 10 Leaderboard -->
    <section class="mb-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-white flex items-center gap-3">
                <svg class="w-8 h-8 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
                Top 10 Global
            </h2>
            <a href="/leaderboard" class="text-neon-blue hover:text-white font-semibold flex items-center gap-1 transition-colors">
                View Full Leaderboard <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        @php
            // Dummy Data for Top 10
            $users = [
                ['id' => 1, 'rank' => 1, 'name' => 'Alex Chen', 'username' => '@alexc', 'points' => 9850, 'avatar' => 'https://ui-avatars.com/api/?name=Alex+Chen&background=random&size=150'],
                ['id' => 2, 'rank' => 2, 'name' => 'Sarah Johnson', 'username' => '@sarahj', 'points' => 8420, 'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=random&size=150'],
                ['id' => 3, 'rank' => 3, 'name' => 'Michael Lin', 'username' => '@mlin99', 'points' => 7900, 'avatar' => 'https://ui-avatars.com/api/?name=Michael+Lin&background=random&size=150'],
                ['id' => 4, 'rank' => 4, 'name' => 'Jessica Wong', 'username' => '@jwong', 'points' => 7200, 'avatar' => 'https://ui-avatars.com/api/?name=Jessica+Wong&background=random&size=150'],
                ['id' => 5, 'rank' => 5, 'name' => 'David Smith', 'username' => '@daves', 'points' => 6850, 'avatar' => 'https://ui-avatars.com/api/?name=David+Smith&background=random&size=150'],
                ['id' => 6, 'rank' => 6, 'name' => 'Emily Davis', 'username' => '@emilyd', 'points' => 6500, 'avatar' => 'https://ui-avatars.com/api/?name=Emily+Davis&background=random&size=150'],
                ['id' => 7, 'rank' => 7, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'points' => 6120, 'avatar' => 'https://ui-avatars.com/api/?name=Ryan+Taylor&background=random&size=150'],
                ['id' => 8, 'rank' => 8, 'name' => 'Lisa Wong', 'username' => '@lisaw', 'points' => 5800, 'avatar' => 'https://ui-avatars.com/api/?name=Lisa+Wong&background=random&size=150'],
                ['id' => 9, 'rank' => 9, 'name' => 'James Miller', 'username' => '@jmiller', 'points' => 5400, 'avatar' => 'https://ui-avatars.com/api/?name=James+Miller&background=random&size=150'],
                ['id' => 10, 'rank' => 10, 'name' => 'Amanda Lee', 'username' => '@amandalee', 'points' => 5100, 'avatar' => 'https://ui-avatars.com/api/?name=Amanda+Lee&background=random&size=150'],
            ];
            
            // Extract top 3 for podium
            $top3 = array_slice($users, 0, 3);
            // Extract ranks 4-10
            $ranks4_10 = array_slice($users, 3);
        @endphp

        <!-- Top 3 Podium (Reused concepts from leaderboard but slightly more compact) -->
        <div class="flex justify-center items-end gap-2 md:gap-6 mb-12 h-[250px] z-100">
            <!-- 2nd Place -->
            @if(isset($top3[1]))
            <div class="flex flex-col items-center group w-1/4 sm:w-[150px] relative z-10 translate-y-8">
                <div class="absolute -top-10 opacity-0 group-hover:-translate-y-2 group-hover:opacity-100 transition-all duration-300">
                    <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-bold text-gray-300 border border-white/20">#2 Rank</span>
                </div>
                <!-- Avatar -->
                <div class="relative mb-4 shrink-0 transition-transform duration-500 group-hover:scale-110">
                    <!-- Silver Crown Base / Icon -->
                    <div class="absolute -top-6 -left-3 -right-3 flex justify-center drop-shadow-[0_0_10px_rgba(209,213,219,0.5)] z-20">
                        <svg class="w-8 h-8 text-gray-300" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path></svg>
                    </div>
                    <img src="{{ $top3[1]['avatar'] }}" class="w-16 h-16 md:w-20 md:h-20 rounded-full border-4 border-gray-400 bg-slate-800 object-cover z-10 relative" alt="2nd">
                </div>
                <!-- Podium Block -->
                <div class="w-full text-center relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-500/10 via-gray-400/20 to-gray-300/40 rounded-t-2xl border-t border-l border-r border-gray-400/50 backdrop-blur-sm -z-10 h-[140px]"></div>
                    <div class="pt-4 pb-2 px-1">
                        <h3 class="font-bold text-white text-xs md:text-sm truncate w-full">{{ $top3[1]['name'] }}</h3>
                        <p class="text-neon-blue font-black text-sm md:text-lg tracking-tight">{{ number_format($top3[1]['points']) }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- 1st Place (Center) -->
            @if(isset($top3[0]))
            <div class="flex flex-col items-center group w-1/3 sm:w-[180px] relative z-20">
                <div class="absolute -top-10 opacity-0 group-hover:-translate-y-2 group-hover:opacity-100 transition-all duration-300">
                    <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-bold text-yellow-400 border border-yellow-500/50 shadow-[0_0_10px_rgba(234,179,8,0.3)]">Champion</span>
                </div>
                <!-- Avatar -->
                <div class="relative mb-4 shrink-0 transition-transform duration-500 group-hover:scale-110">
                    <!-- Golden Crown Overlay / Glow -->
                    <div class="absolute -top-8 -left-4 -right-4 flex justify-center drop-shadow-[0_0_15px_rgba(250,204,21,0.8)] z-20">
                        <svg class="w-12 h-12 text-yellow-400" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5L8.5 10L12 4L15.5 10L21 5L19 16H5M19 19C19 19.55 18.55 20 18 20H6C5.45 20 5 19.55 5 19V18H19V19Z"></path></svg>
                    </div>
                    <img src="{{ $top3[0]['avatar'] }}" class="w-20 h-20 md:w-28 md:h-28 rounded-full border-4 border-yellow-400 bg-slate-800 object-cover z-10 relative shadow-[0_0_30px_rgba(250,204,21,0.4)]" alt="1st">
                </div>
                <!-- Podium Block -->
                <div class="w-full text-center relative">
                    <!-- Glassy Podium Base -->
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-600/10 via-yellow-500/20 to-yellow-400/40 rounded-t-2xl border-t-2 border-l border-r border-yellow-400/70 backdrop-blur-md -z-10 h-[190px] shadow-[inset_0_4px_20px_rgba(250,204,21,0.3)]"></div>
                    <div class="pt-6 pb-2 px-1">
                        <h3 class="font-extrabold text-white text-sm md:text-base truncate w-full">{{ $top3[0]['name'] }}</h3>
                        <p class="text-yellow-400 font-black text-lg md:text-2xl drop-shadow-[0_0_8px_rgba(250,204,21,0.5)] tracking-tight">{{ number_format($top3[0]['points']) }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- 3rd Place -->
            @if(isset($top3[2]))
            <div class="flex flex-col items-center group w-1/4 sm:w-[150px] relative z-10 translate-y-12">
                <div class="absolute -top-10 opacity-0 group-hover:-translate-y-2 group-hover:opacity-100 transition-all duration-300">
                    <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-bold text-orange-300 border border-white/20">#3 Rank</span>
                </div>
                <!-- Avatar -->
                <div class="relative mb-4 shrink-0 transition-transform duration-500 group-hover:scale-110">
                    <!-- Bronze Crown Base / Icon -->
                    <div class="absolute -top-6 -left-3 -right-3 flex justify-center drop-shadow-[0_0_10px_rgba(217,119,6,0.5)] z-20">
                        <svg class="w-8 h-8 text-orange-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path></svg>
                    </div>
                    <img src="{{ $top3[2]['avatar'] }}" class="w-16 h-16 md:w-20 md:h-20 rounded-full border-4 border-orange-400 bg-slate-800 object-cover z-10 relative" alt="3rd">
                </div>
                <!-- Podium Block -->
                <div class="w-full text-center relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-600/10 via-orange-500/20 to-orange-400/40 rounded-t-2xl border-t border-l border-r border-orange-400/50 backdrop-blur-sm -z-10 h-[125px]"></div>
                    <div class="pt-4 pb-2 px-1">
                        <h3 class="font-bold text-white text-xs md:text-sm truncate w-full">{{ $top3[2]['name'] }}</h3>
                        <p class="text-neon-blue font-black text-sm md:text-lg tracking-tight">{{ number_format($top3[2]['points']) }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Rank 4 to 10 List -->
        <div class="max-w-3xl mx-auto flex flex-col gap-3 z-1  mt-[100px]">
            @foreach($ranks4_10 as $user)
            <div class="glass-panel p-4 rounded-xl flex items-center gap-4 transition-all duration-300 hover:bg-white/10 hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(0,0,0,0.2)] group cursor-pointer border border-white/5 hover:border-white/20">
                <!-- Rank Number -->
                <div class="w-10 text-center font-bold text-gray-500 group-hover:text-neon-blue transition-colors text-lg">
                    #{{ $user['rank'] }}
                </div>
                
                <!-- Avatar -->
                <div class="relative shrink-0">
                    <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-12 h-12 rounded-full border-2 border-transparent group-hover:border-neon-blue/50 transition-colors object-cover bg-slate-800">
                </div>

                <!-- Info -->
                <div class="flex-grow min-w-0">
                    <div class="flex items-center gap-2 mb-0.5">
                        <h3 class="text-base font-bold text-white truncate group-hover:text-neon-blue transition-colors">{{ $user['name'] }}</h3>
                    </div>
                    <div class="text-xs text-gray-400 truncate">{{ $user['username'] }}</div>
                </div>

                <!-- Score -->
                <div class="text-right">
                    <div class="text-lg font-black text-neon-blue tabular-nums tracking-tight">{{ number_format($user['points']) }} <span class="text-[10px] text-gray-500 uppercase tracking-widest block -mt-1 font-bold">PTS</span></div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section: Classes Preview -->
    <section class="mb-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-white">Available Classes</h2>
            <a href="/class" class="text-neon-blue hover:text-white font-semibold flex items-center gap-1 transition-colors">
                View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        
        @php
            $classes = [
                ['id' => 1, 'title' => 'Advanced Networking', 'category' => 'Networking', 'points' => 500, 'bg_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=400'],
                ['id' => 2, 'title' => 'Cloud Infrastructure', 'category' => 'Cloud', 'points' => 450, 'bg_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=400'],
                ['id' => 3, 'title' => 'Web Security Basics', 'category' => 'Security', 'points' => 300, 'bg_image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=400'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($classes as $class)
            <div class="glass-panel rounded-2xl overflow-hidden group border border-white/5 hover:border-purple-500/30 transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(168,85,247,0.15)] flex flex-col h-full bg-slate-900/50">
                <div class="h-40 w-full relative overflow-hidden bg-slate-800">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900/90 z-10"></div>
                    <img src="{{ $class['bg_image'] }}" alt="{{ $class['title'] }}" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 group-hover:scale-110 transition-all duration-700">

                </div>
                <div class="p-5 relative flex-grow flex flex-col">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-purple-400 transition-colors">{{ $class['title'] }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section: Mentors Preview -->
    <section class="mb-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-white">Meet Our Mentors</h2>
            <a href="/mentor" class="text-emerald-400 hover:text-white font-semibold flex items-center gap-1 transition-colors">
                View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        @php
            $mentors = [
                ['id' => 1, 'name' => 'Dr. Alan Turing', 'nim' => 'M-10045', 'avatar' => 'https://ui-avatars.com/api/?name=Alan+Turing&background=10b981&color=fff&size=200', 'classes_count' => 12],
                ['id' => 2, 'name' => 'Grace Hopper', 'nim' => 'M-10012', 'avatar' => 'https://ui-avatars.com/api/?name=Grace+Hopper&background=14b8a6&color=fff&size=200', 'classes_count' => 8],
                ['id' => 3, 'name' => 'Linus Torvalds', 'nim' => 'M-10078', 'avatar' => 'https://ui-avatars.com/api/?name=Linus+Torvalds&background=059669&color=fff&size=200', 'classes_count' => 15],
                ['id' => 4, 'name' => 'Ada Lovelace', 'nim' => 'M-10112', 'avatar' => 'https://ui-avatars.com/api/?name=Ada+Lovelace&background=0d9488&color=fff&size=200', 'classes_count' => 5],
            ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($mentors as $mentor)
            <div class="glass-panel p-6 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(16,185,129,0.15)] border border-white/5 hover:border-emerald-500/30">
                <img src="{{ $mentor['avatar'] }}" alt="{{ $mentor['name'] }}" class="w-20 h-20 rounded-full border-2 border-slate-700 mb-4 group-hover:border-emerald-500 transition-colors shadow-lg">
                <h3 class="text-lg font-bold text-white mb-1 group-hover:text-emerald-400 transition-colors leading-tight">{{ $mentor['name'] }}</h3>
                <span class="text-[10px] font-mono bg-white/5 text-gray-400 px-2 py-0.5 rounded border border-white/10 mb-3">{{ $mentor['nim'] }}</span>
                <p class="text-xs font-semibold text-emerald-500/80 uppercase tracking-wider">{{ $mentor['classes_count'] }} Classes</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section: Call to action / Instagram -->
    <section class="mb-10 relative overflow-hidden rounded-[2rem] glass-panel border border-pink-500/20 shadow-[0_20px_50px_rgba(236,72,153,0.1)]">
        <div class="absolute inset-0 bg-gradient-to-r from-pink-600/20 via-purple-600/20 to-indigo-600/20 -z-10"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-pink-500/20 rounded-full blur-[80px] -z-10 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-500/20 rounded-full blur-[80px] -z-10 -translate-x-1/2 translate-y-1/2"></div>
        
        <div class="px-8 py-16 md:py-20 flex flex-col items-center text-center">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 flex items-center justify-center p-[2px] mb-6 shadow-xl">
                <div class="w-full h-full bg-slate-900 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 tracking-tight">Stay Connected!</h2>
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mb-8 leading-relaxed font-medium">
                Lihat dan ikuti keseruan kami dengan mengunjungi instagram dengan tagar <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400 font-bold">#DNCCUpSkill2026</span>
            </p>
            
            <a href="https://instagram.com/dnccsemarang" target="_blank" rel="noopener noreferrer" class="px-8 py-4 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold text-lg shadow-[0_0_30px_rgba(236,72,153,0.4)] transition-all duration-300 hover:shadow-[0_0_40px_rgba(236,72,153,0.6)] hover:scale-105 flex items-center gap-2">
                Follow @dnccsemarang
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </section>

</div>
@endsection
