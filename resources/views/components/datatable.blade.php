@props(['title', 'subtitle' => '', 'searchUrl' => '#'])

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden gsap-table">

    <div
        class="px-6 py-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-slate-50/30">
        <div>
            <h3 class="text-lg font-extrabold text-slate-800">{{ $title }}</h3>
            @if ($subtitle)
                <p class="text-sm text-slate-500 mt-1">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="flex flex-wrap items-center gap-2">
            {{ $actions ?? '' }}
            {{ $addButton ?? '' }}
        </div>
    </div>

    <div
        class="px-6 py-4 border-b border-slate-100 bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">

        {{-- FITUR PER PAGE AKTIF --}}
        <div class="flex items-center text-sm text-slate-500">
            <span>Tampilkan</span>
            <select onchange="window.location.href = this.value"
                class="mx-2 bg-slate-50 border border-slate-200 text-slate-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-1.5 outline-none transition-all font-semibold">
                @foreach ([10, 25, 50, 100] as $value)
                    <option value="{{ request()->fullUrlWithQuery(['per_page' => $value]) }}"
                        {{ request('per_page', 10) == $value ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <span>data</span>
        </div>

        <div class="flex items-center gap-2 w-full sm:w-auto">
            <form action="{{ $searchUrl }}" method="GET" class="relative w-full sm:w-64">
                {{-- Agar saat cari data, filter per_page tidak hilang --}}
                @if (request('per_page'))
                    <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 outline-none transition-all"
                    placeholder="Cari data...">
            </form>

            <button
                class="bg-slate-50 border border-slate-200 text-slate-600 p-2.5 rounded-xl hover:bg-slate-100 hover:text-indigo-600 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-slate-500">
            <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-100">
                <tr>
                    {{ $head }}
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                {{ $body }}
            </tbody>
        </table>
    </div>

    @if (isset($pagination))
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
            {{ $pagination }}
        </div>
    @endif

</div>
