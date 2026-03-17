<nav class="glass-panel sticky top-0 z-50 w-full border-b border-mariner-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="/" class="flex-shrink-0 flex items-center gap-2 group">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-mariner-400 to-mariner-600 flex items-center justify-center font-black text-white text-xl shadow-[0_4px_10px_rgba(6,132,255,0.3)] group-hover:shadow-[0_4px_15px_rgba(6,132,255,0.5)] group-hover:-translate-y-0.5 transition-all">
                    D
                </div>
                <span class="text-mariner-900 font-bold text-xl tracking-wider hidden sm:block">DNCC<span class="text-mariner-500 font-poppins font-black">Rank</span></span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="/leaderboard" class="{{ request()->is('leaderboard') ? 'text-mariner-700 font-bold' : 'text-mariner-500 font-medium' }} hover:text-mariner-800 px-3 py-2 rounded-md transition-colors">Klasemen</a>
                    <a href="/class" class="{{ request()->is('class') ? 'text-mariner-700 font-bold' : 'text-mariner-500 font-medium' }} hover:text-mariner-800 px-3 py-2 rounded-md transition-colors">Kelas</a>
                    <a href="/member" class="{{ request()->is('member') ? 'text-mariner-700 font-bold' : 'text-mariner-500 font-medium' }} hover:text-mariner-800 px-3 py-2 rounded-md transition-colors">Anggota</a>
                    <a href="/daftar-mentor" class="{{ request()->is('mentor') ? 'text-mariner-700 font-bold' : 'text-mariner-500 font-medium' }} hover:text-mariner-800 px-3 py-2 rounded-md transition-colors">Mentor</a>
                </div>
            </div>

            <!-- Login Button -->
            <div class="hidden md:block">
                <a href="/admin" class="relative group inline-flex items-center justify-center px-6 py-2 text-sm font-bold text-white transition-all duration-200 outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mariner-400 rounded-full bg-mariner-600 hover:bg-mariner-700 shadow-md hover:shadow-lg hover:-translate-y-0.5 border border-mariner-500 overflow-hidden">
                    <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black"></span>
                    <span class="relative">Masuk Yuk!</span>
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="inline-flex items-center justify-center p-2 rounded-md text-mariner-400 hover:text-mariner-700 hover:bg-mariner-100 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-md border-t border-mariner-200 shadow-lg absolute w-full left-0">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="/leaderboard" class="block px-4 py-3 rounded-xl font-bold {{ request()->is('leaderboard') ? 'text-mariner-700 bg-mariner-100' : 'text-mariner-500 hover:text-mariner-800 hover:bg-mariner-50' }}">Klasemen</a>
            <a href="/class" class="block px-4 py-3 rounded-xl font-bold {{ request()->is('class') ? 'text-mariner-700 bg-mariner-100' : 'text-mariner-500 hover:text-mariner-800 hover:bg-mariner-50' }}">Kelas</a>
            <a href="/member" class="block px-4 py-3 rounded-xl font-bold {{ request()->is('member') ? 'text-mariner-700 bg-mariner-100' : 'text-mariner-500 hover:text-mariner-800 hover:bg-mariner-50' }}">Anggota</a>
            <a href="/mentor" class="block px-4 py-3 rounded-xl font-bold {{ request()->is('mentor') ? 'text-mariner-700 bg-mariner-100' : 'text-mariner-500 hover:text-mariner-800 hover:bg-mariner-50' }}">Mentor</a>
            <div class="pt-4 mt-2 border-t border-mariner-100">
                <a href="/admin" class="block w-full text-center px-4 py-3 rounded-xl font-bold text-white bg-mariner-600 hover:bg-mariner-700 shadow-md">Masuk Yuk!</a>
            </div>
        </div>
    </div>
</nav>
