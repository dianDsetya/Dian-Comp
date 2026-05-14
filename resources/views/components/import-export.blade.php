<div class="flex items-center gap-2">
    {{-- EXPORT --}}
    <a href="{{ $exportRoute }}"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-semibold text-emerald-600 bg-emerald-50 rounded-lg hover:bg-emerald-500 hover:text-white transition-colors border border-emerald-100">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
            </path>
        </svg>
        Export
    </a>

    {{-- IMPORT --}}
    <button type="button" onclick="openModal('{{ $modalId }}')"
        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-semibold text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-500 hover:text-white transition-colors border border-blue-100">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
            </path>
        </svg>
        Import
    </button>
</div>
