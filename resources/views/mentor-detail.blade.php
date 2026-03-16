@extends('layouts.app')

@section('title', 'Mentor Profile - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Clean Light Gradients Background -->
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-mariner-400 via-mariner-500 to-mariner-600 rounded-b-[3rem] opacity-90 -z-10 shadow-lg"></div>

    @php
        // Dummy data for Mentor Profile
        $mentor = [
            'name' => 'Dr. Alan Turing',
            'nim' => 'M-10045',
            'role' => 'Lead Networking Engineer & Mentor',
            'avatar' => \App\Http\Controllers\Controller::getAvatarUrl('M-10045', 'Dr. Alan Turing'),
            'classes' => [
                [
                    'id' => 1,
                    'name' => 'Advanced Networking',
                    'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=200',
                    'description' => 'Master the concepts of routing, switching, and cloud infrastructure.',
                    'students' => 142
                ],
                [
                    'id' => 5,
                    'name' => 'Linux System Admin',
                    'thumbnail' => 'https://images.unsplash.com/photo-1629654297299-c8506221ca97?auto=format&fit=crop&q=80&w=200',
                    'description' => 'Comprehensive guide to mastering Linux server administration.',
                    'students' => 312
                ]
            ],
        ];
    @endphp

    <!-- Top Profile Section -->
    <div class="relative mt-8">
        <div class="glass-panel bg-white/90 rounded-[2.5rem] p-8 md:p-10 flex flex-col md:flex-row items-center md:items-start gap-8 shadow-md border-mariner-100">
            
            <!-- Avatar Section -->
            <div class="relative shrink-0 flex flex-col items-center group -mt-20 md:-mt-24">
                <div class="w-40 h-40 md:w-48 md:h-48 rounded-3xl border-4 border-white overflow-hidden shadow-lg transition-transform duration-500 group-hover:scale-105 group-hover:-translate-y-2 bg-mariner-100">
                    <img src="{{ $mentor['avatar'] }}" alt="{{ $mentor['name'] }}" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Basic Info & Stats -->
            <div class="flex-grow w-full text-center md:text-left mt-2 md:mt-0">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-black text-mariner-950 mb-2 tracking-tight flex items-center justify-center md:justify-start gap-3 drop-shadow-sm">
                            {{ $mentor['name'] }}
                        </h1>
                        <p class="text-lg font-bold text-mariner-600">{{ $mentor['role'] }}</p>
                        <div class="inline-flex items-center mt-2">
                            <span class="px-4 py-1.5 rounded-full bg-mariner-100 text-mariner-800 text-sm font-bold tracking-wide border border-mariner-200 font-mono shadow-sm">NIM: {{ $mentor['nim'] }}</span>
                        </div>
                    </div>

                    <!-- Highlight Stat (Active Classes) -->
                    <div class="shrink-0 bg-mariner-50 border border-mariner-200 rounded-2xl px-6 py-4 flex flex-col items-center justify-center shadow-sm">
                        <div class="flex items-center gap-2 text-3xl font-black text-mariner-600">
                            {{ count($mentor['classes']) }}
                            <svg class="w-6 h-6 shrink-0 text-mariner-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <p class="text-xs text-mariner-500 font-bold uppercase tracking-widest mt-1">Active Classes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Layout -->
    <div class="mt-8 flex justify-center">
        
        <!-- Main Column: Classes -->
        <div class="w-full max-w-4xl space-y-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-bold text-mariner-900 tracking-tight">Taught by {{ $mentor['name'] }}</h2>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($mentor['classes'] as $class)
                <div class="glass-panel bg-white p-4 rounded-2xl flex flex-col transition-all duration-300 hover:bg-mariner-50 hover:-translate-y-1 hover:shadow-md group cursor-pointer border border-mariner-100 hover:border-mariner-300 relative overflow-hidden shadow-sm">
                    <div class="h-40 w-full rounded-xl overflow-hidden relative mb-4 border border-mariner-100">
                        <div class="absolute inset-0 bg-mariner-500/10 mix-blend-overlay group-hover:opacity-0 transition-opacity z-10"></div>
                        <img src="{{ $class['thumbnail'] }}" alt="{{ $class['name'] }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-lg font-extrabold text-mariner-950 mb-2 leading-tight group-hover:text-mariner-600 transition-colors">{{ $class['name'] }}</h3>
                        <p class="text-sm text-mariner-600 font-medium line-clamp-2 leading-relaxed">{{ $class['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
    </div>
</div>
@endsection
