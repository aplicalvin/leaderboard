@extends('layouts.app')

@section('title', 'All Members - DNCC')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Header -->
    <header class="mb-10 text-center relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-32 bg-mariner-200/50 rounded-full blur-[60px] -z-10 pointer-events-none"></div>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-mariner-950 mb-3 drop-shadow-sm">
            Anggota <span class="bg-clip-text text-transparent bg-gradient-to-r from-mariner-500 to-mariner-800">DNCC</span>
        </h1>
        <p class="text-mariner-600 max-w-2xl mx-auto font-medium">Lihat semua anggota yang terdaftar, peringkat global mereka, dan total skornya.</p>
    </header>

    @php
        // The $users collection is passed from the MemberController
    @endphp

    <!-- Search/Filter Bar (UI Only) -->
    <div class="mb-8 flex flex-col sm:flex-row gap-4 relative z-10">
        <div class="relative flex-grow">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-mariner-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-3 border border-mariner-200 rounded-xl leading-5 bg-white text-mariner-900 placeholder-mariner-400 focus:outline-none focus:ring-2 focus:ring-mariner-400 focus:border-mariner-400 sm:text-sm transition-colors shadow-sm" placeholder="Cari anggota lewat nama atau NIM...">
        </div>
        <button class="shrink-0 px-6 py-3 bg-white border border-mariner-200 rounded-xl text-mariner-700 font-bold hover:bg-mariner-50 hover:border-mariner-300 transition-colors flex items-center justify-center gap-2 shadow-sm">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
            </svg>
            Urutkan Peringkat
        </button>
    </div>

    <!-- Member Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 relative z-10">
        @forelse($users as $user)
        <a href="/{{ $user->username }}" class="glass-panel bg-white rounded-2xl p-5 flex items-center gap-4 transition-all duration-300 hover:bg-mariner-50 hover:-translate-y-1 hover:shadow-md border border-mariner-100 hover:border-mariner-300 group shadow-sm">
            
            <!-- Rank Indicator -->
            <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-mariner-50 to-mariner-100 border border-mariner-200 flex items-center justify-center font-black text-xl {{ $user->rank <= 3 ? 'text-transparent bg-clip-text bg-gradient-to-br from-yellow-500 to-amber-700' : 'text-mariner-500 group-hover:text-mariner-700 transition-colors' }}">
                #{{ $user->rank }}
            </div>

            <!-- Avatar -->
            <div class="w-14 h-14 shrink-0 rounded-full border-2 border-mariner-100 overflow-hidden relative group-hover:border-mariner-400 transition-colors">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
            </div>

            <!-- Member Info -->
            <div class="flex-grow min-w-0">
                <div class="flex items-center gap-2 mb-0.5">
                    <h3 class="text-base font-bold text-mariner-900 truncate group-hover:text-mariner-700 transition-colors">{{ $user->name }}</h3>
                </div>
                <div class="flex items-center gap-2 text-xs text-mariner-500 font-medium">
                    <span class="truncate">{{ $user->username }}</span>
                    <span class="w-1 h-1 rounded-full bg-mariner-300"></span>
                    <span class="font-mono text-mariner-400">{{ $user->nim }}</span>
                </div>
            </div>

            <!-- Points -->
            <div class="shrink-0 text-right pr-2">
                <div class="text-xl font-black text-mariner-600 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-mariner-500 group-hover:to-mariner-800 transition-all duration-300 tabular-nums">
                    {{ number_format($user->points) }}
                </div>
                <span class="text-[10px] text-mariner-400 font-bold uppercase tracking-widest group-hover:text-mariner-500 transition-colors">Poin</span>
            </div>
            
            <!-- Link Arrow -->
            <div class="shrink-0 text-mariner-300 group-hover:text-mariner-600 transition-colors transform group-hover:translate-x-1 duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>
        @empty
        <div class="col-span-1 md:col-span-2 glass-panel rounded-2xl p-12 text-center border-dashed border-2 border-mariner-200">
            <p class="text-mariner-500 font-bold">Belum ada anggota nih.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center shadow-sm">
        {{ $users->links() }}
    </div>
</div>
@endsection
