@props(['title', 'value', 'icon', 'color'])

<div
    class="bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 flex items-center justify-between group hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
    <div>
        <p class="text-sm font-medium text-gray-500 mb-1">{{ $title }}</p>
        <h4 class="text-3xl font-bold text-gray-900">{{ $value }}</h4>
    </div>
    <div
        class="w-14 h-14 rounded-2xl flex items-center justify-center {{ $color }} text-white shadow-inner transform group-hover:rotate-12 transition-transform duration-300">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icon !!}</svg>
    </div>
</div>
