@extends('layouts.app')

@section('title', 'All Mentors - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Background Decor -->
    <div class="absolute top-10 left-1/4 w-72 h-72 bg-mariner-300/40 rounded-full blur-[80px] -z-10 pointer-events-none"></div>
    <div class="absolute bottom-10 right-1/4 w-80 h-80 bg-blue-300/30 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <!-- Header -->
    <header class="mb-12 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-mariner-950 mb-3 drop-shadow-sm">
                Expert <span class="bg-clip-text text-transparent bg-gradient-to-r from-mariner-500 to-mariner-800">Mentors</span>
            </h1>
            <p class="text-mariner-600 font-medium max-w-2xl text-sm md:text-base">Connect with our experienced mentors to guide you through your learning journey in Networking and Infrastructure.</p>
        </div>
    </header>

    @php
        // Dummy Data Setup for Mentors List
        $mentors = [
            [
                'id' => 1, 
                'name' => 'Dr. Alan Turing', 
                'nim' => 'M-10045',
                'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10045', 'Alan Turing'),
                'classes_count' => 12,
            ],
            [
                'id' => 2, 
                'name' => 'Grace Hopper', 
                'nim' => 'M-10012',
                'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10012', 'Grace Hopper'),
                'classes_count' => 8,
            ],
            [
                'id' => 3, 
                'name' => 'Linus Torvalds', 
                'nim' => 'M-10078',
                'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10078', 'Linus Torvalds'),
                'classes_count' => 15,
            ],
            [
                'id' => 4, 
                'name' => 'Ada Lovelace', 
                'nim' => 'M-10112',
                'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10112', 'Ada Lovelace'),
                'classes_count' => 5,
            ],
            [
                'id' => 5, 
                'name' => 'Tim Berners-Lee', 
                'nim' => 'M-10234',
                'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10234', 'Tim Berners-Lee'),
                'classes_count' => 9,
            ],
            [
                'id' => 6, 
                'name' => 'Margaret Hamilton', 
                'nim' => 'M-10156',
                'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10156', 'Margaret Hamilton'),
                'classes_count' => 7,
            ],
        ];
    @endphp

    <!-- Mentors Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
        @forelse($mentors as $mentor)
        <div class="glass-panel bg-white rounded-3xl overflow-hidden group relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(6,132,255,0.1)] border border-mariner-200 hover:border-mariner-400">
            
            <!-- Profile Content -->
            <div class="px-6 pb-6 pt-10 relative flex flex-col items-center text-center">
                <!-- Avatar -->
                <div class="w-28 h-28 rounded-full border-4 border-white overflow-hidden bg-mariner-100 shadow-[0_5px_15px_rgba(6,132,255,0.15)] group-hover:border-mariner-200 transition-colors z-20 transform group-hover:-translate-y-2 duration-300 mb-5 relative">
                    <img src="{{ $mentor['avatar'] }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover">
                </div>

                <!-- Info -->
                <h3 class="text-2xl font-bold text-mariner-950 mb-2 group-hover:text-mariner-600 transition-colors">{{ $mentor['name'] }}</h3>
                <div class="inline-flex items-center mb-6">
                    <span class="px-3 py-1 rounded-full text-xs font-mono bg-mariner-50 text-mariner-600 border border-mariner-200 uppercase tracking-widest font-bold shadow-sm">{{ $mentor['nim'] }}</span>
                </div>

                <!-- Active Class Stat -->
                <div class="py-4 border-t border-mariner-100 mb-4 flex justify-between items-center w-full">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-mariner-100 text-mariner-600 flex items-center justify-center border border-mariner-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-mariner-900">Active Classes</span>
                    </div>
                    <div class="text-2xl font-black text-mariner-600">{{ $mentor['classes_count'] }}</div>
                </div>

                <!-- Action Button -->
                <a href="/mentor/detail" class="w-full block text-center py-3 rounded-xl border border-mariner-200 bg-mariner-50 text-mariner-700 font-extrabold text-sm tracking-wide transition-all duration-300 hover:bg-mariner-500 hover:text-white hover:border-mariner-400 hover:shadow-[0_8px_20px_rgba(6,132,255,0.25)]">
                    View Profile
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 glass-panel rounded-2xl p-16 text-center border-dashed border-2 border-mariner-200 bg-white">
            <h3 class="text-xl font-bold text-mariner-900 mb-2">No Mentors Found</h3>
            <p class="text-mariner-500 font-medium max-w-sm mx-auto">We couldn't find any mentors matching your criteria.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
