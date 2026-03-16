@extends('layouts.app')

@section('title', 'Classes - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Background Decor -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-mariner-200/50 rounded-full blur-[80px] -z-10 pointer-events-none"></div>
    <div class="absolute bottom-20 left-10 w-80 h-80 bg-blue-200/50 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6 relative z-10">
        <div class="text-center md:text-left z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-mariner-950 mb-2 drop-shadow-sm">
                Available <span class="bg-clip-text text-transparent bg-gradient-to-r from-mariner-500 to-mariner-800">Classes</span>
            </h1>
            <p class="text-mariner-600 font-medium text-sm md:text-base max-w-xl">Explore our curated learning paths and join the classes that match your interests to earn points and climb the ranks.</p>
        </div>
        

    </div>

    @php
        // $classes is passed from the backend controller
    @endphp

    <!-- Class Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
        @forelse($classes as $class)
        <div class="glass-panel bg-white rounded-2xl flex flex-col group overflow-hidden border border-mariner-200 hover:border-mariner-400 transition-all duration-300 hover:shadow-[0_15px_40px_rgba(30,163,255,0.15)] hover:-translate-y-1 relative shadow-sm">
            
            <!-- Hover sheen -->
            <div class="absolute inset-0 bg-gradient-to-tr from-mariner-100/0 via-white/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-10"></div>

            <!-- Thumbnail -->
            <div class="h-48 shrink-0 relative overflow-hidden bg-mariner-100">
                <div class="absolute inset-0 bg-mariner-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                <!-- Thumbnail Image -->
                <img src="{{ $class->image ?? 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=600' }}" alt="{{ $class->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
            </div>

            <!-- Info container -->
            <div class="p-6 flex flex-col flex-grow relative z-20 bg-white">
                <h3 class="text-xl font-bold text-mariner-950 mb-2 tracking-tight group-hover:text-mariner-600 transition-colors">{{ $class->name }}</h3>
                <p class="text-sm text-mariner-600 mb-6 line-clamp-2 leading-relaxed flex-grow font-medium">{{ $class->description }}</p>
                
                <div class="pt-4 mt-auto border-t border-mariner-100 flex items-center justify-between">
                    <!-- Mentor Details attached -->
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-mariner-50 flex items-center justify-center border border-mariner-200 text-mariner-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-mariner-400 font-bold mb-0 leading-none">Mentor</p>
                            <p class="text-xs font-bold text-mariner-800 mt-0.5">{{ $class->mentor->name ?? 'Unknown' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-1.5 text-mariner-600 font-bold text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        {{ number_format($class->members_count ?? 10) }}
                    </div>
                </div>

                <!-- Hover join button effect -->
                <button class="w-full mt-5 py-2.5 rounded-xl bg-mariner-50 border border-mariner-200 text-mariner-700 font-extrabold flex items-center justify-center gap-2 group-hover:bg-mariner-500 group-hover:text-white group-hover:border-mariner-400 group-hover:shadow-[0_8px_20px_rgba(6,132,255,0.3)] transition-all duration-300">
                    View Details
                    <svg class="w-4 h-4 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 glass-panel rounded-2xl p-16 text-center border-dashed border-2 border-mariner-200 bg-white shadow-sm">
            <svg class="w-16 h-16 text-mariner-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <h3 class="text-xl font-bold text-mariner-900 mb-2">No Classes Found</h3>
            <p class="text-mariner-500 font-medium max-w-sm mx-auto">There are currently no classes available in this category. Check back later!</p>
        </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    <div class="mt-8 flex justify-center shadow-sm">
        {{ $classes->links() }}
    </div>
</div>
@endsection
