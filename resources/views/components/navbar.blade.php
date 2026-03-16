<nav class="glass-panel sticky top-0 z-50 w-full border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="/" class="flex-shrink-0 flex items-center gap-2 group">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-neon-blue to-neon-purple flex items-center justify-center font-black text-white text-xl shadow-[0_0_10px_rgba(0,243,255,0.5)] group-hover:shadow-[0_0_20px_rgba(0,243,255,0.8)] transition-all">
                    D
                </div>
                <span class="text-white font-bold text-xl tracking-wider hidden sm:block">DNCC<span class="text-neon-blue font-poppins font-black">Rank</span></span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="/leaderboard" class="{{ request()->is('leaderboard') ? 'text-neon-blue' : 'text-gray-300' }} hover:text-neon-blue px-3 py-2 rounded-md text-sm font-medium transition-colors">Leaderboard</a>
                    <a href="/class" class="{{ request()->is('class') ? 'text-neon-blue' : 'text-gray-300' }} hover:text-neon-blue px-3 py-2 rounded-md text-sm font-medium transition-colors">Class</a>
                    <a href="/member" class="{{ request()->is('member') ? 'text-neon-blue' : 'text-gray-300' }} hover:text-neon-blue px-3 py-2 rounded-md text-sm font-medium transition-colors">Member</a>
                    <a href="/mentor" class="{{ request()->is('mentor') ? 'text-neon-blue' : 'text-gray-300' }} hover:text-neon-blue px-3 py-2 rounded-md text-sm font-medium transition-colors">Mentor</a>
                </div>
            </div>

            <!-- Login Button -->
            <div>
                <a href="/admin" class="relative group inline-flex items-center justify-center px-6 py-2 text-sm font-bold text-white transition-all duration-200 outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neon-purple rounded-full bg-slate-900 border border-neon-blue hover:border-transparent hover:shadow-[0_0_15px_rgba(181,55,242,0.6)] overflow-hidden">
                    <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black"></span>
                    <span class="absolute inset-0 w-full h-full transition-all duration-200 group-hover:bg-gradient-to-r group-hover:from-neon-blue group-hover:to-neon-purple"></span>
                    <span class="relative">Login</span>
                </a>
            </div>
            
            <!-- Mobile menu button (visual only) -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
