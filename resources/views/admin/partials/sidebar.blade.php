<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900/60 backdrop-blur-md border-r border-white/10 shadow-2xl flex flex-col h-screen transform -translate-x-full transition-all duration-300 md:relative md:translate-x-0 md:bg-gray-900">

    <div class="h-20 flex items-center justify-center border-b border-gray-700/50 px-6 shrink-0">
        <div class="flex items-center gap-3 w-full">
            {{-- Icon "T" untuk Tech/Inventory --}}
            <div
                class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-blue-500/20">
                D
            </div>
            <span class="text-xl font-bold text-white tracking-wide">Dian Comp</span>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1 scrollbar-hide" id="sidebar-menu">

        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-2">Main Menu</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard.*') ? 'bg-blue-500/15 text-blue-400 border border-blue-500/20' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all group">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">Inventory Data</p>

       
        <a href="{{ route('products.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('products.*') ? 'bg-blue-500/15 text-blue-400 border border-blue-500/20' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all">
            {{-- Icon Box/Cube untuk Product --}}
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                </path>
            </svg>
            <span class="font-medium">Master Product</span>
        </a>

        <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">System Control</p>

        {{-- Admin Users --}}
        <a href="{{ route('users.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('users.*') ? 'bg-blue-500/15 text-blue-400 border border-blue-500/20' : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }} transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            <span class="font-medium">Management Users</span>
        </a>

    </nav>
</aside>