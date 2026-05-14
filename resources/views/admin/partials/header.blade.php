<header id="top-navbar"
    class="sticky top-0 w-full h-16 md:h-20 bg-white/90 backdrop-blur-md border-b border-gray-200 flex items-center justify-between px-4 md:px-6 z-20 shadow-sm shrink-0 transition-all duration-300">

    <div class="flex items-center">
        <button type="button" id="sidebar-toggle"
            class="p-2 rounded-xl bg-gray-100 text-gray-600 hover:bg-blue-600 hover:text-white focus:outline-none transition-all duration-200 shadow-sm cursor-pointer z-50">
            <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
            </svg>
        </button>
        <h2 class="ml-4 text-lg md:text-xl font-bold text-gray-800 tracking-tight">@yield('header_title', 'Overview')</h2>
    </div>

    <div class="flex items-center gap-3 relative">

        <span class="hidden md:block text-sm font-medium text-gray-700">
            {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
        </span>

        <div
            class="w-9 h-9 md:w-10 md:h-10 rounded-full overflow-hidden border-2 border-blue-500/50 shadow-sm hover:border-blue-600 transition-colors cursor-pointer flex-shrink-0">
            @php
                $adminName = Auth::guard('admin')->user()->name ?? 'Admin';
                // Update Background Avatar ke Biru (3b82f6)
                $avatarUrl =
                    'https://ui-avatars.com/api/?name=' .
                    urlencode($adminName) .
                    '&background=3b82f6&color=ffffff&bold=true&rounded=true';
            @endphp
            <img src="{{ $avatarUrl }}" alt="Profile" class="w-full h-full object-cover">
        </div>

        <button type="button" onclick="openModal('modalLogout')"
            class="ml-1 md:ml-2 p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors cursor-pointer flex-shrink-0"
            title="Keluar">
            <svg class="w-5 h-5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
        </button>
    </div>
</header>
