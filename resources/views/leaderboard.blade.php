@extends('layouts.app')

@section('title', 'Leaderboard - DNCC')

@push('styles')
<style>
    /* 3D Podium Effect */
    .podium-block {
        position: relative;
        box-shadow: 
            inset 0 1px 1px rgba(255,255,255,0.8),
            0 5px 15px rgba(0,0,0,0.05),
            0 10px 30px var(--glow-color, rgba(0,0,0,0));
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
    
    .avatar-glow-1 { box-shadow: 0 5px 15px rgba(234, 179, 8, 0.4); border-color: #eab308; }
    .avatar-glow-2 { box-shadow: 0 5px 15px rgba(148, 163, 184, 0.4); border-color: #94a3b8; }
    .avatar-glow-3 { box-shadow: 0 5px 15px rgba(217, 119, 6, 0.4); border-color: #d97706; }
    .avatar-glow-default { box-shadow: 0 4px 10px rgba(6, 132, 255, 0.1); border-color: rgba(214, 240, 255, 0.8); }

    /* Global Shine Animation Definition */
    @keyframes shine {
        100% { left: 200%; }
    }
</style>
@endpush

@section('content')

    @php
        $is_empty = $users->isEmpty();
        $others = $ranks4_plus;
    @endphp

    <main class="w-full max-w-3xl px-4 pt-10 pb-20 mx-auto relative z-10">
        
        <!-- Header & Toggle -->
        <header class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6 relative">
            <!-- Decorative blur behind title -->
            <div class="absolute -top-10 -left-10 w-32 h-32 bg-mariner-200/50 rounded-full blur-3xl z-0 pointer-events-none"></div>
            
            <div class="text-center md:text-left z-10">
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-mariner-950 mb-2 flex items-center justify-center md:justify-start gap-3 drop-shadow-sm">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-mariner-500 to-mariner-800">Klasemen Poin</span>
                </h1>
                <p class="text-mariner-600 text-sm md:text-base font-medium">Yuk, intip siapa aja yang jadi jagoan musim ini!</p>
            </div>


        </header>

        @if($is_empty || empty($users))
            <!-- Empty State -->
            <div class="glass-panel rounded-3xl p-12 text-center mt-10 border-mariner-200 relative overflow-hidden bg-white/50">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-mariner-50/50"></div>
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-24 h-24 mb-6 rounded-full glass-panel flex items-center justify-center text-mariner-400 bg-white">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-mariner-900 mb-2">Belum Ada Jagoan</h2>
                    <p class="text-mariner-500 max-w-sm">Arena masih sepi nih. Ayo ikutan kelas dan pamerin namamu di puncak klasemen!</p>
                </div>
            </div>
        @else
            <!-- Podium Section -->
                    <!-- Top 3 Podium -->
        <div class="flex justify-center items-end mb-20 gap-2 md:gap-6 mb-12 h-[180px] z-100">
            <!-- 2nd Place -->
            @if($top2)
            <div class="flex flex-col items-center group w-1/4 sm:w-[150px] relative z-10 translate-y-8">
                <div class="absolute -top-10 opacity-0 group-hover:-translate-y-2 group-hover:opacity-100 transition-all duration-300">
                    <span class="px-3 py-1 bg-mariner-800 text-white rounded-full text-xs font-bold shadow-md">Juara 2</span>
                </div>
                <!-- Avatar -->
                <div class="relative mb-4 shrink-0 transition-transform duration-500 group-hover:scale-110">
                    <!-- Silver Crown Base / Icon -->
                    <div class="absolute -top-6 -left-3 -right-3 flex justify-center drop-shadow-md z-20">
                        <svg class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path></svg>
                    </div>
                    <img src="{{ $top2->avatar }}" class="w-16 h-16 md:w-20 md:h-20 rounded-full border-4 border-gray-300 bg-mariner-100 object-cover z-10 relative shadow-md" alt="2nd">
                </div>
                <!-- Podium Block -->
                <div class="w-full text-center relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-200 to-white rounded-t-2xl border-t border-l border-r border-gray-300 shadow-sm -z-10 h-[97px]"></div>
                    <div class="pt-4 pb-2 px-1">
                        <h3 class="font-bold text-mariner-900 text-xs md:text-sm truncate w-full">{{ $top2->name }}</h3>
                        <p class="text-mariner-600 font-black text-sm md:text-lg tracking-tight">{{ number_format($top2->points) }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- 1st Place (Center) -->
            @if($top1)
            <div class="flex flex-col items-center group w-1/3 sm:w-[180px] relative z-20">
                <div class="absolute -top-10 opacity-0 group-hover:-translate-y-2 group-hover:opacity-100 transition-all duration-300">
                    <span class="px-3 py-1 bg-yellow-400 text-yellow-900 rounded-full text-xs font-bold shadow-md">Sang Juara</span>
                </div>
                <!-- Avatar -->
                <div class="relative mb-4 shrink-0 transition-transform duration-500 group-hover:scale-110">
                    <!-- Golden Crown Overlay / Glow -->
                    <div class="absolute -top-8 -left-4 -right-4 flex justify-center drop-shadow-lg z-20">
                        <svg class="w-12 h-12 text-yellow-500" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5L8.5 10L12 4L15.5 10L21 5L19 16H5M19 19C19 19.55 18.55 20 18 20H6C5.45 20 5 19.55 5 19V18H19V19Z"></path></svg>
                    </div>
                    <img src="{{ $top1->avatar }}" class="w-20 h-20 md:w-28 md:h-28 rounded-full border-4 border-yellow-400 bg-mariner-100 object-cover z-10 relative shadow-lg" alt="1st">
                </div>
                <!-- Podium Block -->
                <div class="w-full text-center relative">
                    <!-- Glassy Podium Base -->
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-100 via-yellow-50 to-white rounded-t-2xl border-t-2 border-l border-r border-yellow-300 shadow-md -z-10 h-[145px]"></div>
                    <div class="pt-6 pb-2 px-1">
                        <h3 class="font-extrabold text-mariner-950 text-sm md:text-base truncate w-full">{{ $top1->name }}</h3>
                        <p class="text-yellow-600 font-black text-lg md:text-2xl drop-shadow-sm tracking-tight">{{ number_format($top1->points) }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- 3rd Place -->
            @if($top3)
            <div class="flex flex-col items-center group w-1/4 sm:w-[150px] relative z-10 translate-y-12">
                <div class="absolute -top-10 opacity-0 group-hover:-translate-y-2 group-hover:opacity-100 transition-all duration-300">
                    <span class="px-3 py-1 bg-mariner-800 text-white rounded-full text-xs font-bold shadow-md">Juara 3</span>
                </div>
                <!-- Avatar -->
                <div class="relative mb-4 shrink-0 transition-transform duration-500 group-hover:scale-110">
                    <!-- Bronze Crown Base / Icon -->
                    <div class="absolute -top-6 -left-3 -right-3 flex justify-center drop-shadow-md z-20">
                        <svg class="w-8 h-8 text-orange-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"></path></svg>
                    </div>
                    <img src="{{ $top3->avatar }}" class="w-16 h-16 md:w-20 md:h-20 rounded-full border-4 border-orange-300 bg-mariner-100 object-cover z-10 relative shadow-md" alt="3rd">
                </div>
                <!-- Podium Block -->
                <div class="w-full text-center relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-100 to-white rounded-t-2xl border-t border-l border-r border-orange-200 shadow-sm -z-10 h-[80px]"></div>
                    <div class="pt-4 pb-2 px-1">
                        <h3 class="font-bold text-mariner-900 text-xs md:text-sm truncate w-full">{{ $top3->name }}</h3>
                        <p class="text-mariner-600 font-black text-sm md:text-lg tracking-tight">{{ number_format($top3->points) }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

            <!-- Ranks 4+ List Section -->
            @if(count($others) > 0)
            <div class="space-y-3 relative">
                <!-- Decorative background elements -->
                <div class="absolute right-0 top-1/2 w-64 h-64 bg-blue-400/10 blur-[80px] rounded-full pointer-events-none transform -translate-y-1/2"></div>
                
                @foreach($others as $index => $user)
                <a href="/{{ $user->username }}" class="glass-panel bg-white rounded-2xl p-4 md:p-5 flex items-center justify-between group hover:bg-mariner-50 border border-mariner-100 hover:border-mariner-300 transition-all duration-300 hover:scale-[1.01] hover:shadow-md cursor-pointer relative overflow-hidden">
                    
                    <!-- Hover shine effect -->
                    <div class="absolute top-0 -left-[100%] w-1/2 h-full bg-gradient-to-r from-transparent via-white/40 to-transparent skew-x-[-20deg] group-hover:animate-[shine_1.5s_ease-in-out]"></div>

                    <div class="flex items-center gap-4 md:gap-6 z-10 w-full md:w-auto">
                        <!-- Rank Number -->
                        <div class="w-8 relative flex justify-center">
                            <span class="text-xl md:text-2xl font-black text-mariner-400 group-hover:text-mariner-600 transition-colors">{{ $user->rank }}</span>
                        </div>
                        
                        <!-- Avatar -->
                        <div class="w-12 h-12 md:w-14 md:h-14 rounded-full border border-mariner-200 overflow-hidden flex-shrink-0 avatar-glow-default bg-mariner-100 relative group-hover:border-mariner-400 transition-colors">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                            <!-- Status indicator (design detail) -->
                            <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></div>
                        </div>

                        <!-- User Info -->
                        <div class="flex flex-col min-w-0 pr-4">
                            <h3 class="text-base md:text-lg font-bold text-mariner-900 truncate max-w-[150px] md:max-w-[250px] mb-0.5 group-hover:text-mariner-700 transition-colors">{{ $user->name }}</h3>
                            <div class="flex items-center gap-2 text-xs md:text-sm text-mariner-500 font-medium">
                                <span class="truncate">{{ $user->username }}</span>
                                <span class="w-1 h-1 rounded-full bg-mariner-300"></span>
                                <span class="text-mariner-400 font-mono font-semibold">{{ $user->nim }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Points -->
                    <div class="flex flex-col items-end z-10 ml-auto">
                        <div class="text-xl md:text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-mariner-500 to-mariner-800 drop-shadow-sm tabular-nums">
                            {{ number_format($user->points) }}
                        </div>
                        <span class="text-[10px] md:text-xs text-mariner-400 font-bold tracking-wider uppercase mt-1">Poin</span>
                    </div>
                </a>
                @endforeach
            </div>
            @endif
        @endif
        
    </main>

@endsection
