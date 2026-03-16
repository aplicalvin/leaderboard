@extends('layouts.app')

@section('title', 'All Mentors - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Background Decor -->
    <div class="absolute top-10 left-1/4 w-72 h-72 bg-emerald-600/10 rounded-full blur-[80px] -z-10 pointer-events-none"></div>
    <div class="absolute bottom-10 right-1/4 w-80 h-80 bg-teal-500/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <!-- Header -->
    <header class="mb-12 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-3">
                Expert <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 to-teal-400">Mentors</span>
            </h1>
            <p class="text-gray-400 font-medium max-w-2xl text-sm md:text-base">Connect with our experienced mentors to guide you through your learning journey in Networking and Infrastructure.</p>
        </div>

        
    </header>

    @php
        // Dummy Data Setup for Mentors List
        $mentors = [
            [
                'id' => 1, 
                'name' => 'Dr. Alan Turing', 
                'nim' => 'M-10045',
                'avatar' => 'https://ui-avatars.com/api/?name=Alan+Turing&background=10b981&color=fff&size=250',
                'classes_count' => 12,
            ],
            [
                'id' => 2, 
                'name' => 'Grace Hopper', 
                'nim' => 'M-10012',
                'avatar' => 'https://ui-avatars.com/api/?name=Grace+Hopper&background=14b8a6&color=fff&size=250',
                'classes_count' => 8,
            ],
            [
                'id' => 3, 
                'name' => 'Linus Torvalds', 
                'nim' => 'M-10078',
                'avatar' => 'https://ui-avatars.com/api/?name=Linus+Torvalds&background=059669&color=fff&size=250',
                'classes_count' => 15,
            ],
            [
                'id' => 4, 
                'name' => 'Ada Lovelace', 
                'nim' => 'M-10112',
                'avatar' => 'https://ui-avatars.com/api/?name=Ada+Lovelace&background=0d9488&color=fff&size=250',
                'classes_count' => 5,
            ],
            [
                'id' => 5, 
                'name' => 'Tim Berners-Lee', 
                'nim' => 'M-10234',
                'avatar' => 'https://ui-avatars.com/api/?name=Tim+Berners-Lee&background=047857&color=fff&size=250',
                'classes_count' => 9,
            ],
            [
                'id' => 6, 
                'name' => 'Margaret Hamilton', 
                'nim' => 'M-10156',
                'avatar' => 'https://ui-avatars.com/api/?name=Margaret+Hamilton&background=0f766e&color=fff&size=250',
                'classes_count' => 7,
            ],
        ];
    @endphp

    <!-- Mentors Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
        @forelse($mentors as $mentor)
        <div class="glass-panel rounded-3xl overflow-hidden group relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(16,185,129,0.15)] border border-white/5 hover:border-emerald-500/30">
            
            <!-- Profile Content -->
            <div class="px-6 pb-6 pt-10 relative flex flex-col items-center text-center">
                <!-- Avatar -->
                <div class="w-28 h-28 rounded-full border-4 border-slate-900 overflow-hidden bg-slate-800 shadow-xl group-hover:border-emerald-500/50 transition-colors z-20 transform group-hover:-translate-y-2 duration-300 mb-5 relative">
                    <img src="{{ $mentor['avatar'] }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover">
                </div>

                <!-- Info -->
                <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-emerald-400 transition-colors">{{ $mentor['name'] }}</h3>
                <div class="inline-flex items-center mb-6">
                    <span class="px-3 py-1 rounded-full text-xs font-mono bg-white/5 text-gray-300 border border-white/10 uppercase tracking-widest">{{ $mentor['nim'] }}</span>
                </div>

                <!-- Active Class Stat -->
                <div class="py-4 border-t border-white/10 mb-4 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-white">Active Classes</span>
                    </div>
                    <div class="text-xl font-black text-emerald-400">{{ $mentor['classes_count'] }}</div>
                </div>

                <!-- Action Button -->
                <a href="/mentor/detail" class="w-full block text-center py-2.5 rounded-xl border border-emerald-500/30 bg-emerald-500/10 text-emerald-300 font-bold text-sm tracking-wide transition-all duration-300 hover:bg-emerald-500 hover:text-white hover:shadow-[0_0_20px_rgba(16,185,129,0.4)]">
                    View Profile
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 glass-panel rounded-2xl p-16 text-center border-dashed border-2 border-white/10">
            <h3 class="text-xl font-bold text-white mb-2">No Mentors Found</h3>
            <p class="text-gray-400 font-medium max-w-sm mx-auto">We couldn't find any mentors matching your criteria.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
