@props(['type' => 'text', 'name', 'placeholder', 'isPassword' => false])

<div class="relative mb-6 group animate-fade-up">

    <div
        class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#84cc16] transition-colors duration-300 pointer-events-none z-10">
        {{ $icon ?? '' }}
    </div>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
        placeholder="{{ $placeholder }}"
        class="block w-full py-3.5 pl-12 {{ $isPassword ? 'pr-12' : 'pr-4' }} text-base text-white bg-white/10 border border-white/20 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-[#84cc16]/50 focus:border-[#84cc16] focus:bg-white/20 transition-all duration-300 placeholder:text-gray-400 backdrop-blur-sm relative z-0"
        required />

    @if ($isPassword)
        <button type="button" id="toggle-{{ $name }}"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#84cc16] focus:outline-none transition-colors z-10 p-1">
            <svg id="icon-eye-{{ $name }}" class="w-5 h-5 block" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                </path>
            </svg>

            <svg id="icon-eye-slash-{{ $name }}" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                </path>
            </svg>
        </button>
    @endif
</div>
