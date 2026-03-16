@extends('layouts.app')

@section('title', 'Leaderboard - DNCC')

@push('styles')
<style>
    /* 3D Podium Effect */
    .podium-block {
        position: relative;
        box-shadow: 
            inset 0 1px 1px rgba(255,255,255,0.1),
            0 -2px 10px rgba(0,0,0,0.5),
            0 -10px 20px -5px var(--glow-color, rgba(0,0,0,0));
        transition: transform 0.3s ease, var(--glow-color) 0.3s ease;
    }
    
    /* Floating animation for crown/medal */
    .floating {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0px); }
    }

    /* Glowing text/borders */
    .glow-text {
        text-shadow: 0 0 10px currentColor;
    }
    
    .avatar-glow-1 { box-shadow: 0 0 15px rgba(234, 179, 8, 0.5); border-color: #eab308; }
    .avatar-glow-2 { box-shadow: 0 0 15px rgba(148, 163, 184, 0.5); border-color: #94a3b8; }
    .avatar-glow-3 { box-shadow: 0 0 15px rgba(217, 119, 6, 0.5); border-color: #d97706; }
    .avatar-glow-default { box-shadow: 0 0 10px rgba(0, 243, 255, 0.2); border-color: rgba(255,255,255,0.2); }

    /* Global Shine Animation Definition */
    @keyframes shine {
        100% { left: 200%; }
    }
</style>
@endpush

@section('content')

    @php
        // Dummy Data Setup
        $is_empty = false; // Set to true to test empty state
        
        $users = [
            ['id' => 1, 'rank' => 1, 'name' => 'Alex Chen', 'username' => '@alexc', 'nim' => '202310045', 'points' => 9850, 'avatar' => 'https://i.pravatar.cc/150?u=1'],
            ['id' => 2, 'rank' => 2, 'name' => 'Sarah Johnson', 'username' => '@sarahj', 'nim' => '202310012', 'points' => 8420, 'avatar' => 'https://i.pravatar.cc/150?u=2'],
            ['id' => 3, 'rank' => 3, 'name' => 'Michael Lin', 'username' => '@mlin99', 'nim' => '202310078', 'points' => 7900, 'avatar' => 'https://i.pravatar.cc/150?u=3'],
            ['id' => 4, 'rank' => 4, 'name' => 'Jessica Wong', 'username' => '@jwong', 'nim' => '202310112', 'points' => 7200, 'avatar' => 'https://i.pravatar.cc/150?u=4'],
            ['id' => 5, 'rank' => 5, 'name' => 'David Smith', 'username' => '@daves', 'nim' => '202310234', 'points' => 6850, 'avatar' => 'https://i.pravatar.cc/150?u=5'],
            ['id' => 6, 'rank' => 6, 'name' => 'Emily Davis', 'username' => '@emilyd', 'nim' => '202310156', 'points' => 6500, 'avatar' => 'https://i.pravatar.cc/150?u=6'],
            ['id' => 7, 'rank' => 7, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=7'],
            ['id' => 8, 'rank' => 8, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=8'],
            ['id' => 9, 'rank' => 9, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=9'],
            ['id' => 10, 'rank' => 10, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=10'],
            ['id' => 11, 'rank' => 11, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=11'],
            ['id' => 12, 'rank' => 12, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=12'],
            ['id' => 13, 'rank' => 13, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=13'],
            ['id' => 14, 'rank' => 14, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=14'],
            ['id' => 15, 'rank' => 15, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=15'],
            ['id' => 16, 'rank' => 16, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://i.pravatar.cc/150?u=16'],
        ];

        if($is_empty) {
            $users = [];
        }

        // Helper function to extract specific ranks safely
        $getTopUser = function($rank, $users) {
            foreach($users as $u) { if($u['rank'] === $rank) return $u; }
            return null;
        };

        $top1 = $getTopUser(1, $users);
        $top2 = $getTopUser(2, $users);
        $top3 = $getTopUser(3, $users);
        
        $others = array_filter($users, fn($u) => $u['rank'] > 3);
    @endphp

    <main class="w-full max-w-3xl px-4 pt-10 pb-20 mx-auto relative z-10">
        
        <!-- Header & Toggle -->
        <header class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6 relative">
            <!-- Decorative blur behind title -->
            <div class="absolute -top-10 -left-10 w-32 h-32 bg-neon-blue/20 rounded-full blur-3xl z-0 pointer-events-none"></div>
            
            <div class="text-center md:text-left z-10">
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-2 flex items-center justify-center md:justify-start gap-3">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-neon-blue to-neon-purple">Leaderboard</span>
                </h1>
                <p class="text-gray-400 text-sm md:text-base font-medium">Discover the top performers of the season.</p>
            </div>


        </header>

        @if($is_empty || empty($users))
            <!-- Empty State -->
            <div class="glass-panel rounded-3xl p-12 text-center mt-10 border-white/5 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50"></div>
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-24 h-24 mb-6 rounded-full glass-panel flex items-center justify-center text-gray-500">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2分散 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2">No Leaders Yet</h2>
                    <p class="text-gray-400 max-w-sm">The arena is empty. Start participating to claim your spot on the podium!</p>
                </div>
            </div>
        @else
            <!-- Podium Section -->
            <div class="mt-16 mb-24 px-2">
                <div class="flex items-end justify-center w-full max-w-2xl mx-auto gap-2 md:gap-4 lg:gap-6 h-64 md:h-80 select-none">
                    
                    <!-- Rank 2 (Left) -->
                    @if($top2)
                    <div class="flex-1 flex flex-col items-center relative z-20 group">
                        <div class="flex flex-col items-center absolute -top-28 md:-top-32 w-full transition-transform duration-300 group-hover:-translate-y-2">
                            <!-- Medal -->
                            <div class="text-3xl md:text-4xl mb-2 floating" style="animation-delay: 0.5s;">🥈</div>
                            <!-- Avatar -->
                            <div class="relative w-16 h-16 md:w-20 md:h-20 mb-3 rounded-full border-2 avatar-glow-2 overflow-hidden bg-gray-800 z-10">
                                <img src="{{ $top2['avatar'] }}" alt="{{ $top2['name'] }}" class="w-full h-full object-cover">
                                <div class="absolute -bottom-2 -right-2 bg-slate-400 text-black text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center border-2 border-deep-navy">2</div>
                            </div>
                            <div class="text-center px-1">
                                <p class="text-sm md:text-base font-bold text-white truncate w-24 md:w-32">{{ $top2['name'] }}</p>
                                <p class="text-xs text-neon-blue font-semibold mt-1">{{ number_format($top2['points']) }} <span class="text-gray-500 font-normal">pts</span></p>
                            </div>
                        </div>
                        <!-- Podium Base -->
                        <div class="w-full h-32 md:h-40 rounded-t-xl podium-block bg-[#0f172a] border border-slate-600/30 border-b-0 backdrop-blur-md relative overflow-hidden" style="--glow-color: rgba(148, 163, 184, 0.2)">
                            <div class="absolute inset-0 bg-podium-2"></div>
                            <!-- Slanted light reflection -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-slate-300/50 to-transparent"></div>
                            <div class="absolute -inset-1/2 bg-gradient-to-br from-white/5 to-transparent rotate-45 pointer-events-none"></div>
                        </div>
                    </div>
                    @else
                    <div class="flex-1 h-32 md:h-40"></div>
                    @endif

                    <!-- Rank 1 (Center) -->
                    @if($top1)
                    <div class="flex-1 flex flex-col items-center relative z-30 group">
                        <div class="absolute -top-40 md:-top-48 w-full h-full bg-yellow-500/10 blur-[50px] rounded-full pointer-events-none"></div>
                        <div class="flex flex-col items-center absolute -top-36 md:-top-40 w-full transition-transform duration-300 group-hover:-translate-y-2">
                            <!-- Crown -->
                            <div class="text-4xl md:text-5xl mb-1 floating glow-text text-yellow-500 drop-shadow-[0_0_15px_rgba(234,179,8,1)]">👑</div>
                            <!-- Avatar -->
                            <div class="relative w-20 h-20 md:w-28 md:h-28 mb-3 rounded-full border-4 avatar-glow-1 overflow-hidden bg-gray-800 z-10">
                                <img src="{{ $top1['avatar'] }}" alt="{{ $top1['name'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 ring-inset ring-2 ring-white/20 rounded-full"></div>
                                <div class="absolute -bottom-1 -mx-2 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-black text-xs md:text-sm font-extrabold rounded-full px-2 py-0.5 border-2 border-deep-navy shadow-lg z-20">1ST</div>
                            </div>
                            <div class="text-center px-1 relative z-10 w-[120%]">
                                <p class="text-base md:text-lg font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-600 drop-shadow-md truncate">{{ $top1['name'] }}</p>
                                <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">{{ $top1['username'] }}</p>
                                <div class="mt-2 inline-flex items-center justify-center px-3 py-1 rounded-full bg-white/10 border border-white/10 backdrop-blur-sm">
                                    <span class="text-sm md:text-base font-bold text-white">{{ number_format($top1['points']) }} <span class="text-neon-purple text-xs">PTS</span></span>
                                </div>
                            </div>
                        </div>
                        <!-- Podium Base -->
                        <div class="w-full h-44 md:h-56 rounded-t-2xl podium-block bg-[#1a1506] border border-yellow-600/30 border-b-0 backdrop-blur-md relative overflow-hidden" style="--glow-color: rgba(234, 179, 8, 0.4)">
                            <div class="absolute inset-0 bg-podium-1"></div>
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-yellow-400/60 to-transparent"></div>
                            <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-yellow-500/10 to-transparent"></div>
                            <!-- Dynamic vertical lines -->
                            <div class="absolute left-1/2 -ml-[1px] top-0 h-full w-[2px] bg-gradient-to-b from-yellow-500/30 to-transparent"></div>
                        </div>
                    </div>
                    @else
                    <div class="flex-1 h-44 md:h-56"></div>
                    @endif

                    <!-- Rank 3 (Right) -->
                    @if($top3)
                    <div class="flex-1 flex flex-col items-center relative z-10 group">
                        <div class="flex flex-col items-center absolute -top-24 md:-top-28 w-full transition-transform duration-300 group-hover:-translate-y-2">
                            <!-- Medal -->
                            <div class="text-2xl md:text-3xl mb-2 floating" style="animation-delay: 1.2s;">🥉</div>
                            <!-- Avatar -->
                            <div class="relative w-14 h-14 md:w-16 md:h-16 mb-2 rounded-full border-2 avatar-glow-3 overflow-hidden bg-gray-800 z-10">
                                <img src="{{ $top3['avatar'] }}" alt="{{ $top3['name'] }}" class="w-full h-full object-cover">
                                <div class="absolute -bottom-2 -right-2 bg-amber-600 text-white text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center border-2 border-deep-navy">3</div>
                            </div>
                            <div class="text-center px-1">
                                <p class="text-xs md:text-sm font-bold text-white/90 truncate w-20 md:w-28">{{ $top3['name'] }}</p>
                                <p class="text-[10px] md:text-xs text-neon-blue font-semibold mt-1">{{ number_format($top3['points']) }} <span class="text-gray-500 font-normal">pts</span></p>
                            </div>
                        </div>
                        <!-- Podium Base -->
                        <div class="w-full h-24 md:h-32 rounded-t-xl podium-block bg-[#1f160c] border border-amber-700/30 border-b-0 backdrop-blur-md relative overflow-hidden" style="--glow-color: rgba(217, 119, 6, 0.2)">
                            <div class="absolute inset-0 bg-podium-3"></div>
                            <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-amber-600/50 to-transparent"></div>
                        </div>
                    </div>
                    @else
                    <div class="flex-1 h-24 md:h-32"></div>
                    @endif
                </div>

                <!-- Subtle floor line for podium -->
                <div class="w-full max-w-3xl mx-auto h-[1px] bg-gradient-to-r from-transparent via-white/20 to-transparent shadow-[0_0_10px_rgba(255,255,255,0.2)]"></div>
            </div>

            <!-- Ranks 4+ List Section -->
            @if(count($others) > 0)
            <div class="space-y-3 relative">
                <!-- Decorative background elements -->
                <div class="absolute right-0 top-1/2 w-64 h-64 bg-neon-purple/5 blur-[80px] rounded-full pointer-events-none transform -translate-y-1/2"></div>
                
                @foreach($others as $index => $user)
                <div class="glass-panel rounded-2xl p-4 md:p-5 flex items-center justify-between group hover:bg-white/[0.05] transition-all duration-300 hover:scale-[1.01] hover:border-white/20 cursor-default relative overflow-hidden">
                    
                    <!-- Hover shine effect -->
                    <div class="absolute top-0 -left-[100%] w-1/2 h-full bg-gradient-to-r from-transparent via-white/5 to-transparent skew-x-[-20deg] group-hover:animate-[shine_1.5s_ease-in-out]"></div>

                    <div class="flex items-center gap-4 md:gap-6 z-10 w-full md:w-auto">
                        <!-- Rank Number -->
                        <div class="w-8 relative flex justify-center">
                            <span class="text-xl md:text-2xl font-black text-gray-500 group-hover:text-white transition-colors">{{ $user['rank'] }}</span>
                        </div>
                        
                        <!-- Avatar -->
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-full border border-white/10 overflow-hidden flex-shrink-0 avatar-glow-default relative">
                            <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-full h-full object-cover">
                            <!-- Status indicator (design detail) -->
                            <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-deep-navy rounded-full"></div>
                        </div>

                        <!-- User Info -->
                        <div class="flex flex-col min-w-0 pr-4">
                            <h3 class="text-base md:text-lg font-bold text-white truncate max-w-[150px] md:max-w-[250px] mb-0.5 group-hover:text-neon-blue transition-colors">{{ $user['name'] }}</h3>
                            <div class="flex items-center gap-2 text-xs md:text-sm text-gray-400">
                                <span class="truncate">{{ $user['username'] }}</span>
                                <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                                <span class="text-gray-500 font-mono">{{ $user['nim'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Points -->
                    <div class="flex flex-col items-end z-10 ml-auto">
                        <div class="text-xl md:text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-neon-blue to-white drop-shadow-sm tabular-nums">
                            {{ number_format($user['points']) }}
                        </div>
                        <span class="text-[10px] md:text-xs text-neon-purple font-bold tracking-wider uppercase mt-1">Points</span>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        @endif
        
    </main>

@endsection
