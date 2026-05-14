@props(['id', 'title' => '', 'maxWidth' => 'md'])

@php
    $maxWidthClass =
        [
            'sm' => 'max-w-sm',
            'md' => 'max-w-md',
            'lg' => 'max-w-lg',
            'xl' => 'max-w-xl',
            '2xl' => 'max-w-2xl',
        ][$maxWidth] ?? 'max-w-md';
@endphp

<div id="{{ $id }}" class="fixed inset-0 hidden opacity-0 transition-opacity duration-300"
    style="z-index: 9999;">
    <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm cursor-pointer" onclick="closeModal('{{ $id }}')">
    </div>

    <div class="fixed inset-0 flex items-center justify-center p-4 pointer-events-none">
        <div id="{{ $id }}Box"
            class="bg-white w-full {{ $maxWidthClass }} rounded-2xl shadow-2xl pointer-events-auto transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">

            @if ($title)
                <div class="p-5 border-b border-gray-100 flex justify-between items-center shrink-0">
                    <h3 class="text-lg font-bold text-gray-900">{{ $title }}</h3>
                    <button type="button" onclick="closeModal('{{ $id }}')"
                        class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <div class="p-6 overflow-y-auto scrollbar-hide">
                {{ $slot }}
            </div>

            @if (isset($footer))
                <div class="p-5 border-t border-gray-100 bg-gray-50/50 rounded-b-2xl flex justify-end gap-3 shrink-0">
                    {{ $footer }}
                </div>
            @endif

        </div>
    </div>
</div>
