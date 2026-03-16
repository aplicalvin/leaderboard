@extends('layouts.app')

@section('title', 'All Members - DNCC')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Header -->
    <header class="mb-10 text-center relative z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-32 bg-neon-blue/20 rounded-full blur-[60px] -z-10 pointer-events-none"></div>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-3">
            DNCC <span class="bg-clip-text text-transparent bg-gradient-to-r from-neon-blue to-neon-purple">Members</span>
        </h1>
        <p class="text-gray-400 max-w-2xl mx-auto font-medium">Browse all registered members, their global ranks, and total scores.</p>
    </header>

    @php
        // Dummy Data Setup for Member List
        $users = [
            ['id' => 1, 'rank' => 1, 'name' => 'Alex Chen', 'username' => '@alexc', 'nim' => '202310045', 'points' => 9850, 'avatar' => 'https://ui-avatars.com/api/?name=Alex+Chen&background=random&size=150'],
            ['id' => 2, 'rank' => 2, 'name' => 'Sarah Johnson', 'username' => '@sarahj', 'nim' => '202310012', 'points' => 8420, 'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=random&size=150'],
            ['id' => 3, 'rank' => 3, 'name' => 'Michael Lin', 'username' => '@mlin99', 'nim' => '202310078', 'points' => 7900, 'avatar' => 'https://ui-avatars.com/api/?name=Michael+Lin&background=random&size=150'],
            ['id' => 4, 'rank' => 4, 'name' => 'Jessica Wong', 'username' => '@jwong', 'nim' => '202310112', 'points' => 7200, 'avatar' => 'https://ui-avatars.com/api/?name=Jessica+Wong&background=random&size=150'],
            ['id' => 5, 'rank' => 5, 'name' => 'David Smith', 'username' => '@daves', 'nim' => '202310234', 'points' => 6850, 'avatar' => 'https://ui-avatars.com/api/?name=David+Smith&background=random&size=150'],
            ['id' => 6, 'rank' => 6, 'name' => 'Emily Davis', 'username' => '@emilyd', 'nim' => '202310156', 'points' => 6500, 'avatar' => 'https://ui-avatars.com/api/?name=Emily+Davis&background=random&size=150'],
            ['id' => 7, 'rank' => 7, 'name' => 'Ryan Taylor', 'username' => '@ryant', 'nim' => '202310089', 'points' => 6120, 'avatar' => 'https://ui-avatars.com/api/?name=Ryan+Taylor&background=random&size=150'],
            ['id' => 8, 'rank' => 8, 'name' => 'Lisa Wong', 'username' => '@lisaw', 'nim' => '202310221', 'points' => 5800, 'avatar' => 'https://ui-avatars.com/api/?name=Lisa+Wong&background=random&size=150'],
        ];
    @endphp

    <!-- Search/Filter Bar (UI Only) -->
    <div class="mb-8 flex flex-col sm:flex-row gap-4 relative z-10">
        <div class="relative flex-grow">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-3 border border-white/10 rounded-xl leading-5 bg-white/5 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-neon-blue focus:border-neon-blue sm:text-sm transition-colors backdrop-blur-sm" placeholder="Search members by name or NIM...">
        </div>
        <button class="shrink-0 px-6 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm font-semibold hover:bg-white/10 hover:border-gray-400 transition-colors flex items-center justify-center gap-2">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
            </svg>
            Sort by Rank
        </button>
    </div>

    <!-- Member Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 relative z-10">
        @forelse($users as $user)
        <a href="/member/detail" class="glass-panel rounded-2xl p-5 flex items-center gap-4 transition-all duration-300 hover:bg-white/[0.05] hover:-translate-y-1 hover:shadow-[0_8px_30px_rgba(0,0,0,0.12)] hover:border-neon-blue/30 group">
            
            <!-- Rank Indicator -->
            <div class="w-12 h-12 shrink-0 rounded-xl bg-gradient-to-br from-indigo-500/20 to-purple-500/20 border border-indigo-400/20 flex items-center justify-center font-black text-xl {{ $user['rank'] <= 3 ? 'text-transparent bg-clip-text bg-gradient-to-br from-yellow-300 to-amber-500' : 'text-gray-300 group-hover:text-white transition-colors' }}">
                #{{ $user['rank'] }}
            </div>

            <!-- Avatar -->
            <div class="w-14 h-14 shrink-0 rounded-full border-2 border-white/10 overflow-hidden relative group-hover:border-neon-purple/50 transition-colors">
                <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-full h-full object-cover">
            </div>

            <!-- Member Info -->
            <div class="flex-grow min-w-0">
                <div class="flex items-center gap-2 mb-0.5">
                    <h3 class="text-base font-bold text-white truncate group-hover:text-neon-blue transition-colors">{{ $user['name'] }}</h3>
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-400">
                    <span class="truncate">{{ $user['username'] }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                    <span class="font-mono text-gray-500">{{ $user['nim'] }}</span>
                </div>
            </div>

            <!-- Points -->
            <div class="shrink-0 text-right pr-2">
                <div class="text-xl font-black text-white group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-neon-blue group-hover:to-neon-purple transition-all duration-300 tabular-nums">
                    {{ number_format($user['points']) }}
                </div>
                <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest text-shadow-sm group-hover:text-neon-purple/80 transition-colors">Pts</span>
            </div>
            
            <!-- Link Arrow -->
            <div class="shrink-0 text-gray-600 group-hover:text-neon-blue transition-colors transform group-hover:translate-x-1 duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>
        @empty
        <div class="col-span-1 md:col-span-2 glass-panel rounded-2xl p-12 text-center border-dashed border-2 border-white/10">
            <p class="text-gray-400 font-medium">No members found.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination (UI Only) -->
    <div class="mt-8 flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-white/10 bg-white/5 text-sm font-medium text-gray-400 hover:bg-white/10 transition-colors">
                <span class="sr-only">Previous</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-white/10 bg-indigo-500/20 text-sm font-medium text-white transition-colors">1</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-white/10 bg-white/5 text-sm font-medium text-gray-400 hover:bg-white/10 hover:text-white transition-colors">2</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-white/10 bg-white/5 text-sm font-medium text-gray-400 hover:bg-white/10 hover:text-white transition-colors">3</a>
            <span class="relative inline-flex items-center px-4 py-2 border border-white/10 bg-white/5 text-sm font-medium text-gray-500">...</span>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-white/10 bg-white/5 text-sm font-medium text-gray-400 hover:bg-white/10 hover:text-white transition-colors">10</a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-white/10 bg-white/5 text-sm font-medium text-gray-400 hover:bg-white/10 transition-colors">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
        </nav>
    </div>
</div>
@endsection
