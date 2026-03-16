@extends('layouts.app')

@section('title', 'Classes - DNCC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative">
    
    <!-- Background Decor -->
    <div class="absolute top-20 right-10 w-64 h-64 bg-fuchsia-600/10 rounded-full blur-[80px] -z-10 pointer-events-none"></div>
    <div class="absolute bottom-20 left-10 w-80 h-80 bg-neon-blue/10 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
        <div class="text-center md:text-left z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-2">
                Available <span class="bg-clip-text text-transparent bg-gradient-to-r from-neon-blue to-fuchsia-400">Classes</span>
            </h1>
            <p class="text-gray-400 font-medium text-sm md:text-base max-w-xl">Explore our curated learning paths and join the classes that match your interests to earn points and climb the ranks.</p>
        </div>
        
        <!-- Filter (UI only) -->
        <div class="flex gap-2 shrink-0 z-10">
            <button class="px-5 py-2 rounded-full border border-indigo-500/50 bg-indigo-500/20 text-indigo-100 text-sm font-bold shadow-[0_0_15px_rgba(99,102,241,0.2)]">All</button>
            <button class="px-5 py-2 rounded-full border border-white/10 bg-white/5 text-gray-400 text-sm font-semibold hover:bg-white/10 hover:text-white transition-colors">Networking</button>
            <button class="px-5 py-2 rounded-full border border-white/10 bg-white/5 text-gray-400 text-sm font-semibold hover:bg-white/10 hover:text-white transition-colors">Security</button>
        </div>
    </div>

    @php
        // Dummy Data Setup for Classes
        $classes = [
            [
                'id' => 1,
                'name' => 'Advanced Networking',
                'category' => 'Networking',
                'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=600',
                'description' => 'Master the concepts of routing, switching, and cloud infrastructure required for enterprise networks.',
                'mentor' => 'David Martinez',
                'points_reward' => 500,
                'members_count' => 142
            ],
            [
                'id' => 2,
                'name' => 'Cybersecurity Fundamentals',
                'category' => 'Security',
                'thumbnail' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=600',
                'description' => 'Learn the basics of ethical hacking, secure systems design, and vulnerability assessment.',
                'mentor' => 'Sarah Johnson',
                'points_reward' => 450,
                'members_count' => 210
            ],
            [
                'id' => 3,
                'name' => 'Cloud Architecture AWS',
                'category' => 'Cloud',
                'thumbnail' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=600',
                'description' => 'Design, deploy, and manage scalable cloud infrastructure using Amazon Web Services.',
                'mentor' => 'Michael Lin',
                'points_reward' => 600,
                'members_count' => 89
            ],
            [
                'id' => 4,
                'name' => 'Network Automation',
                'category' => 'Networking',
                'thumbnail' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=600',
                'description' => 'Automate your repetitive network tasks using Python, Ansible, and API integrations.',
                'mentor' => 'Jessica Wong',
                'points_reward' => 550,
                'members_count' => 56
            ],
            [
                'id' => 5,
                'name' => 'Linux System Admin',
                'category' => 'Infrastructure',
                'thumbnail' => 'https://images.unsplash.com/photo-1629654297299-c8506221ca97?auto=format&fit=crop&q=80&w=600',
                'description' => 'Comprehensive guide to mastering Linux server administration and troubleshooting.',
                'mentor' => 'Alex Chen',
                'points_reward' => 400,
                'members_count' => 312
            ],
            [
                'id' => 6,
                'name' => 'Penetration Testing',
                'category' => 'Security',
                'thumbnail' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&q=80&w=600',
                'description' => 'Advanced hands-on hacking techniques and methodologies for professional pentesters.',
                'mentor' => 'Sarah Johnson',
                'points_reward' => 800,
                'members_count' => 74
            ],
        ];
    @endphp

    <!-- Class Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
        @forelse($classes as $class)
        <div class="glass-panel rounded-2xl flex flex-col group overflow-hidden border border-white/10 hover:border-fuchsia-400/50 transition-all duration-300 hover:shadow-[0_10px_40px_rgba(217,70,239,0.15)] hover:-translate-y-1 relative">
            
            <!-- Hover sheen -->
            <div class="absolute inset-0 bg-gradient-to-tr from-fuchsia-500/0 via-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-10"></div>

            <!-- Thumbnail -->
            <div class="h-48 shrink-0 relative overflow-hidden bg-gray-900">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors z-10"></div>
                <!-- Category Badge -->
                <div class="absolute top-4 left-4 z-20 px-3 py-1 rounded-full bg-black/60 backdrop-blur-md border border-white/20 text-xs font-bold text-white uppercase tracking-wider">
                    {{ $class['category'] }}
                </div>
                <img src="{{ $class['thumbnail'] }}" alt="{{ $class['name'] }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
            </div>

            <!-- Info container -->
            <div class="p-6 flex flex-col flex-grow relative z-20 bg-slate-900/40">
                <!-- Points Tag (floats between image and content) -->
                <div class="absolute -top-5 right-6 bg-gradient-to-r from-amber-400 to-orange-500 text-black px-3 py-1.5 rounded-lg font-black text-sm shadow-[0_5px_15px_rgba(245,158,11,0.4)] flex items-center gap-1 transform transition-transform group-hover:-translate-y-1">
                    <span>🏆</span> {{ $class['points_reward'] }} pts
                </div>

                <h3 class="text-xl font-bold text-white mb-2 tracking-tight group-hover:text-fuchsia-300 transition-colors">{{ $class['name'] }}</h3>
                <p class="text-sm text-gray-400 mb-6 line-clamp-2 leading-relaxed flex-grow">{{ $class['description'] }}</p>
                
                <div class="pt-4 mt-auto border-t border-white/10 flex items-center justify-between">
                    <!-- Mentor Details attached -->
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-slate-700 flex items-center justify-center border border-white/20">
                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-gray-500 font-bold mb-0">Mentor</p>
                            <p class="text-xs font-semibold text-gray-300">{{ $class['mentor'] }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-1.5 text-neon-blue font-semibold text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        {{ number_format($class['members_count']) }}
                    </div>
                </div>

                <!-- Hover join button effect -->
                <button class="w-full mt-4 py-2.5 rounded-lg bg-white/5 border border-white/10 text-white font-semibold flex items-center justify-center gap-2 group-hover:bg-fuchsia-500 group-hover:border-fuchsia-400 group-hover:shadow-[0_0_20px_rgba(217,70,239,0.5)] transition-all duration-300">
                    View Details
                    <svg class="w-4 h-4 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 glass-panel rounded-2xl p-16 text-center border-dashed border-2 border-white/10">
            <svg class="w-16 h-16 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <h3 class="text-xl font-bold text-white mb-2">No Classes Found</h3>
            <p class="text-gray-400 font-medium max-w-sm mx-auto">There are currently no classes available in this category. Check back later!</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
