@extends('layouts.app')

@section('title', 'Home - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Hero Section / Title -->
    <div class="text-center mb-16 relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-mariner-200/50 rounded-full blur-[100px] -z-10 pointer-events-none"></div>
        <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-mariner-950 mb-6 drop-shadow-sm">
            Klasemen DNCC Buat <br>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-mariner-500 to-mariner-800">Sesi Upskilling</span>
        </h1>
        <p class="text-lg text-mariner-700/80 max-w-2xl mx-auto font-medium">Pantau terus progresmu, ikutin kelas-kelas seru yang ada, dan belajar langsung dari Kakak Mentor biar skill-mu makin dewa!</p>
    </div>

    <!-- Section: Top 10 Leaderboard -->
    <section class="mb-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-mariner-900 flex items-center gap-3">
                <svg class="w-8 h-8 text-yellow-500 drop-shadow-sm" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
                Top 10 Jagoan
            </h2>
            <a href="/leaderboard" class="text-mariner-600 hover:text-mariner-800 font-semibold flex items-center gap-1 transition-colors">
                Lihat Semua Klasemen <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        @php
            // Skip the first 3 for the list display
            $ranks4_10 = collect($users)->skip(3);
        @endphp

        <!-- Top 3 Podium -->
        <div class="flex justify-center items-end gap-2 md:gap-6 mb-20 h-[250px] z-100">
            <!-- 2nd Place -->
            @if(isset($top2))
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
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-200 to-white rounded-t-2xl border-t border-l border-r border-gray-300 shadow-sm -z-10 h-[140px]"></div>
                    <div class="pt-4 pb-2 px-1">
                        <h3 class="font-bold text-mariner-900 text-xs md:text-sm truncate w-full">{{ $top2->name }}</h3>
                        <p class="text-mariner-600 font-black text-sm md:text-lg tracking-tight">{{ number_format($top2->points) }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- 1st Place (Center) -->
            @if(isset($top1))
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
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-100 via-yellow-50 to-white rounded-t-2xl border-t-2 border-l border-r border-yellow-300 shadow-md -z-10 h-[190px]"></div>
                    <div class="pt-6 pb-2 px-1">
                        <h3 class="font-extrabold text-mariner-950 text-sm md:text-base truncate w-full">{{ $top1->name }}</h3>
                        <p class="text-yellow-600 font-black text-lg md:text-2xl drop-shadow-sm tracking-tight">{{ number_format($top1->points) }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- 3rd Place -->
            @if(isset($top3))
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
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-100 to-white rounded-t-2xl border-t border-l border-r border-orange-200 shadow-sm -z-10 h-[125px]"></div>
                    <div class="pt-4 pb-2 px-1">
                        <h3 class="font-bold text-mariner-900 text-xs md:text-sm truncate w-full">{{ $top3->name }}</h3>
                        <p class="text-mariner-600 font-black text-sm md:text-lg tracking-tight">{{ number_format($top3->points) }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Rank 4 to 10 List -->
        <div class="max-w-3xl mx-auto flex flex-col gap-3 z-1 mt-[100px]">
            @foreach($ranks4_10 as $user)
            <a href="/{{ $user->username }}" class="glass-panel p-4 rounded-xl flex items-center gap-4 transition-all duration-300 hover:bg-mariner-50 hover:-translate-y-1 hover:shadow-lg group cursor-pointer border border-mariner-100 hover:border-mariner-300">
                <!-- Rank Number -->
                <div class="w-10 text-center font-bold text-mariner-400 group-hover:text-mariner-600 transition-colors text-lg">
                    #{{ $user->rank }}
                </div>
                
                <!-- Avatar -->
                <div class="relative shrink-0">
                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full border-2 border-transparent group-hover:border-mariner-300 transition-colors object-cover bg-mariner-100 shadow-sm">
                </div>

                <!-- Info -->
                <div class="flex-grow min-w-0">
                    <div class="flex items-center gap-2 mb-0.5">
                        <h3 class="text-base font-bold text-mariner-900 truncate group-hover:text-mariner-700 transition-colors">{{ $user->name }}</h3>
                    </div>
                    <div class="text-xs text-mariner-500 truncate font-semibold">{{ $user->username }}</div>
                </div>

                <!-- Score -->
                <div class="text-right">
                    <div class="text-lg font-black text-mariner-600 tabular-nums tracking-tight">{{ number_format($user->points) }} <span class="text-[10px] text-mariner-400 uppercase tracking-widest block -mt-1 font-bold">POIN</span></div>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    <!-- Section: Classes Preview -->
    <section class="mb-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-mariner-900">Kelas Seru Nih</h2>
            <a href="/class" class="text-mariner-600 hover:text-mariner-800 font-semibold flex items-center gap-1 transition-colors">
                Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($classes as $class)
            <div class="glass-panel bg-white rounded-2xl overflow-hidden group border border-mariner-100 hover:border-mariner-300 transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(30,163,255,0.15)] flex flex-col h-full shadow-sm">
                <div class="h-40 w-full relative overflow-hidden bg-mariner-100">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-mariner-900/40 z-10 transition-colors group-hover:to-mariner-900/60"></div>
                    <img src="{{ $class->image ?? 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $class->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-all duration-700">
                </div>
                <div class="p-5 relative flex-grow flex flex-col bg-white z-20">
                    <h3 class="text-xl font-bold text-mariner-900 mb-2 group-hover:text-mariner-600 transition-colors">{{ $class->name }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Section: Mentors Preview -->
    <section class="mb-24">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-mariner-900">Kenalan Sama Mentor Yuk</h2>
            <a href="/mentor" class="text-mariner-600 hover:text-mariner-800 font-semibold flex items-center gap-1 transition-colors">
                Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($mentors as $mentor)
            <a href="/mentor/{{ $mentor->id }}" class="glass-panel bg-white p-6 rounded-2xl flex flex-col items-center text-center group transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(30,163,255,0.15)] border border-mariner-100 hover:border-mariner-300 shadow-sm cursor-pointer">
                <img src="{{ $mentor->avatar }}" alt="{{ $mentor->name }}" class="w-20 h-20 rounded-full border-2 border-mariner-200 mb-4 group-hover:border-mariner-500 transition-colors shadow-md object-cover">
                <h3 class="text-lg font-bold text-mariner-900 mb-1 group-hover:text-mariner-600 transition-colors leading-tight">{{ $mentor->name }}</h3>
                <span class="text-[10px] font-mono bg-mariner-50 text-mariner-600 px-2 py-0.5 rounded border border-mariner-200 mb-3 font-semibold">{{ $mentor->nim }}</span>
                <p class="text-xs font-bold text-mariner-500 uppercase tracking-wider">{{ $mentor->classes_count }} Kelas</p>
            </a>
            @endforeach
        </div>
    </section>

    <!-- Section: Call to action / Instagram -->
    <section class="mb-10 relative overflow-hidden rounded-[2rem] border border-mariner-200 shadow-[0_20px_50px_rgba(30,163,255,0.1)]">
        <div class="absolute inset-0 bg-gradient-to-r from-mariner-400 via-mariner-500 to-mariner-700 -z-10"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/20 rounded-full blur-[80px] -z-10 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400/30 rounded-full blur-[80px] -z-10 -translate-x-1/2 translate-y-1/2"></div>
        
        <div class="px-8 py-16 md:py-20 flex flex-col items-center text-center z-10">
            <div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center p-[2px] mb-6 shadow-xl border border-mariner-200">
                <div class="w-full h-full bg-mariner-50 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-mariner-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 tracking-tight drop-shadow-sm">Jangan Sampai Ketinggalan!</h2>
            <p class="text-lg md:text-xl text-mariner-50 max-w-2xl mb-8 leading-relaxed font-semibold">
                Lihat dan ikuti keseruan kami dengan mengunjungi instagram dengan tagar <br class="hidden md:block">
                <span class="text-white font-black tracking-wide underline decoration-mariner-300 decoration-4 underline-offset-4">#DNCCUpSkill2026</span>
            </p>
            
            <a href="https://instagram.com/dnccsemarang" target="_blank" rel="noopener noreferrer" class="px-8 py-4 rounded-full bg-white text-mariner-700 font-extrabold text-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 hover:bg-mariner-50 border border-mariner-100 flex items-center gap-2">
                Cuss Follow @dnccsemarang
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>
    </section>

</div>
@endsection
