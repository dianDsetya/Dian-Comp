@props(['type' => 'success', 'message'])

@php
    $classes =
        $type === 'success' ? 'bg-green-50 text-green-600 border-green-200' : 'bg-red-50 text-red-600 border-red-200';

    $icon =
        $type === 'success'
            ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>'
            : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
@endphp

@if ($message)
    <div
        class="{{ $classes }} p-4 rounded-xl text-sm font-medium border flex items-center gap-3 animate-fade-in mb-6 shadow-sm">
        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icon !!}</svg>
        <span>{{ $message }}</span>
    </div>
@endif
