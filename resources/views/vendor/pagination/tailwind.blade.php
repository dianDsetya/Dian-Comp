@php
    // Definisikan warna dasar di sini agar mudah diubah
    $bgColor = 'bg-white'; // Background utama
    $borderColor = 'border-gray-300'; // Border default
    $textColor = 'text-slate-700'; // Teks normal
    $textDisabledColor = 'text-slate-400'; // Teks disabled
    $hoverBgColor = 'hover:bg-pink-50'; // Background saat hover
    $hoverTextColor = 'hover:text-pink-700'; // Teks saat hover
    $activeBgColor = 'active:bg-pink-100'; // Background saat active/klik
    $activeTextColor = 'active:text-pink-800'; // Teks saat active/klik
    $focusRingColor = 'focus:ring-pink-300'; // Warna ring focus
    $focusBorderColor = 'focus:border-pink-400'; // Warna border focus

    $currentPageBgColor = 'bg-pink-600'; // Background halaman aktif
    $currentPageTextColor = 'text-white'; // Teks halaman aktif
    $currentPageBorderColor = 'border-pink-600'; // Border halaman aktif

    // Gabungkan kelas umum untuk link
    $linkClasses = "relative inline-flex items-center px-4 py-2 text-sm font-medium {$textColor} {$bgColor} border {$borderColor} leading-5 {$hoverTextColor} {$hoverBgColor} focus:z-10 focus:outline-none {$focusRingColor} {$focusBorderColor} {$activeBgColor} {$activeTextColor} transition ease-in-out duration-150";
    $iconLinkClasses = "relative inline-flex items-center px-2 py-2 text-sm font-medium {$textDisabledColor} {$bgColor} border {$borderColor} leading-5 {$hoverTextColor} {$hoverBgColor} focus:z-10 focus:outline-none {$focusRingColor} {$focusBorderColor} {$activeBgColor} {$activeTextColor} transition ease-in-out duration-150"; // Sedikit beda untuk icon (mungkin warna awal)
    $disabledClasses = "relative inline-flex items-center px-4 py-2 text-sm font-medium {$textDisabledColor} {$bgColor} border {$borderColor} cursor-default leading-5 rounded-md";
    $disabledIconClasses = "relative inline-flex items-center px-2 py-2 text-sm font-medium {$textDisabledColor} {$bgColor} border {$borderColor} cursor-default leading-5";
    $currentClasses = "relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {$currentPageTextColor} {$currentPageBgColor} border {$currentPageBorderColor} cursor-default leading-5";
    $numberLinkClasses = "relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {$textColor} {$bgColor} border {$borderColor} leading-5 {$hoverTextColor} {$hoverBgColor} focus:z-10 focus:outline-none {$focusRingColor} {$focusBorderColor} {$activeBgColor} {$activeTextColor} transition ease-in-out duration-150";
    $ellipsisClasses = "relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium {$textColor} {$bgColor} border {$borderColor} cursor-default leading-5";

@endphp

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        {{-- Mobile --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="{{ $disabledClasses }}">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="{{ $linkClasses }} rounded-md">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="{{ $linkClasses }} ml-3 rounded-md">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="{{ $disabledClasses }} ml-3">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        {{-- Desktop --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            {{-- Showing Results Text --}}
            <div>
                <p class="text-sm {{ $textColor }} leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            {{-- Links Container --}}
            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="{{ $disabledIconClasses }} rounded-l-md" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="{{ $iconLinkClasses }} rounded-l-md" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="{{ $ellipsisClasses }}">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="{{ $currentClasses }}">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="{{ $numberLinkClasses }}"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="{{ $iconLinkClasses }} -ml-px rounded-r-md"
                            aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="{{ $disabledIconClasses }} -ml-px rounded-r-md" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
