@extends('layouts.app')

@section('title', 'Member Profile - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    <!-- Playful Background Gradients (Mariner Light Theme) -->
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-mariner-400 via-mariner-500 to-mariner-600 rounded-b-[3rem] opacity-90 -z-10 shadow-lg"></div>

    @php
        // $member is passed from the backend controller
    @endphp
    <div class="relative mt-8">
        <div class="glass-panel bg-white/90 rounded-[2.5rem] p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 shadow-md border-mariner-100">
            <!-- Avatar -->
            <div class="relative shrink-0 group">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white overflow-hidden shadow-lg transition-transform duration-300 group-hover:scale-105 bg-mariner-100">
                    <img src="{{ $member->avatar }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Basic Info -->
            <div class="flex-grow text-center md:text-left">
                <h1 class="text-4xl md:text-5xl font-black text-mariner-950 mb-2 drop-shadow-sm tracking-tight">{{ $member->name }}</h1>
                <div class="inline-flex items-center gap-2 mb-4">
                    <span class="px-4 py-1.5 rounded-full bg-mariner-100 text-mariner-800 text-sm font-bold tracking-wide border border-mariner-200 font-mono shadow-sm">NIM: {{ $member->nim }}</span>
                    <span class="px-4 py-1.5 rounded-full bg-mariner-50 text-mariner-600 text-sm font-extrabold tracking-wide border border-mariner-200 shadow-sm">Anggota</span>
                </div>
            </div>

            <!-- Total Score & Rank Cards -->
            <div class="shrink-0 w-full md:w-auto flex flex-col sm:flex-row gap-4">
                <!-- Rank Card -->
                <div class="bg-mariner-50 border border-mariner-200 rounded-2xl p-6 text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-md relative overflow-hidden group min-w-[140px] shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_ease-in-out]"></div>
                    <div class="text-5xl mb-2 flex justify-center drop-shadow-sm transform transition-transform group-hover:scale-110">👑</div>
                    <div class="text-mariner-500 text-sm font-bold uppercase tracking-widest mb-1">Peringkat Global</div>
                    <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-mariner-500 to-mariner-800 tabular-nums">
                        #{{ $member->rank }}
                    </div>
                </div>

                <!-- Total Score Card -->
                <div class="bg-white border border-mariner-200 rounded-2xl p-6 text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-md relative overflow-hidden group min-w-[140px] shadow-sm flex flex-col items-center justify-center">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-mariner-50/50 to-transparent -translate-x-full group-hover:animate-[shine_1.5s_ease-in-out]"></div>
                    <div class="text-5xl mb-2 flex justify-center drop-shadow-sm transform transition-transform group-hover:scale-110">🏆</div>
                    <div class="text-mariner-500 text-sm font-bold uppercase tracking-widest mb-1">Total Skor</div>
                    <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-amber-600 drop-shadow-sm tabular-nums">
                        {{ number_format($member->points) }}
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
                <div class="p-2 bg-mariner-100 rounded-lg text-mariner-600 shadow-sm border border-mariner-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-mariner-900 tracking-tight">Kelas Yang Diikutin</h2>
            </div>
            
            <div class="space-y-4">
                @forelse($member->joinedClasses as $class)
                <div class="glass-panel bg-white p-4 rounded-2xl flex items-center gap-5 transition-all duration-300 hover:bg-mariner-50 hover:-translate-y-1 hover:shadow-md group cursor-pointer border border-mariner-100 hover:border-mariner-300 shadow-sm">
                    <div class="w-20 h-20 shrink-0 rounded-xl overflow-hidden relative shadow-sm border border-mariner-100 bg-mariner-50">
                        <div class="absolute inset-0 bg-mariner-500/10 mix-blend-overlay group-hover:opacity-0 transition-opacity"></div>
                        <img src="{{ $class->image ?? 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=200' }}" alt="{{ $class->name }}" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-lg font-bold text-mariner-950 mb-1 group-hover:text-mariner-600 transition-colors">{{ $class->name }}</h3>
                        <p class="text-sm text-mariner-600 font-medium line-clamp-2 leading-relaxed">{{ $class->description }}</p>
                    </div>
                    <div class="shrink-0 p-2 text-mariner-400 opacity-0 group-hover:opacity-100 transition-opacity transform translate-x-4 group-hover:translate-x-0 duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
                @empty
                <div class="glass-panel bg-white rounded-2xl p-8 text-center border-dashed border-2 border-mariner-200">
                    <p class="text-mariner-500 font-bold">Belum ikutan kelas apa-apa nih.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Column 2: Point History -->
        <div class="space-y-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-mariner-100 rounded-lg text-mariner-600 shadow-sm border border-mariner-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-mariner-900 tracking-tight">Riwayat Poin</h2>
            </div>
            
            <div class="glass-panel bg-white rounded-2xl p-6 border border-mariner-100 relative overflow-hidden shadow-sm">
                <!-- Subtle background decoration -->
                <div class="absolute right-0 top-0 w-40 h-40 bg-mariner-200/30 blur-[60px] rounded-full pointer-events-none"></div>
                
                <div class="relative z-10 space-y-4">
                    @forelse($member->scoreLogs as $history)
                    <div class="group flex items-center justify-between p-3 rounded-xl hover:bg-mariner-50 transition-colors border border-transparent hover:border-mariner-200">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-mariner-100 flex items-center justify-center text-mariner-400 group-hover:bg-mariner-500 group-hover:text-white transition-colors border border-mariner-200">
                                <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-mariner-900 font-bold group-hover:text-mariner-600 transition-colors">{{ $history->task->title ?? 'Tambahan Poin' }}</h4>
                                <p class="text-xs text-mariner-500 mt-1 font-semibold">{{ $history->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-lg font-black text-mariner-500 group-hover:scale-110 inline-block transition-transform">+{{ number_format($history->points) }}</span>
                            <span class="text-[10px] text-mariner-400 font-bold uppercase tracking-wider block mt-0.5">poin</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-mariner-100 rounded-full flex items-center justify-center mx-auto mb-4 text-mariner-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <p class="text-mariner-500 font-bold text-sm">Belum ada riwayat poin nih.</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
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
