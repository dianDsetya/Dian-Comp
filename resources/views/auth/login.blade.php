@extends('auth.partials.master')

@section('content')
<div class="glassmorphism-card p-10 transform opacity-0 translate-y-8" id="login-card">
    <div class="text-center mb-8">
        <div class="flex justify-center items-center gap-2 mb-4">
            <div
                class="w-14 h-14 border border-blue-400 rounded-2xl flex items-center justify-center text-blue-400 bg-blue-400/10 shadow-[0_0_20px_rgba(96,165,250,0.2)]">
                {{-- Icon Chip/Processor untuk Tech --}}
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                    </path>
                </svg>
            </div>
        </div>
        <h1 class="text-2xl font-bold text-white mb-2 tracking-wide">Dian Comp</h1>
        <p class="text-sm text-gray-400">Selamat datang kembali! Silakan masuk untuk mengelola inventaris.</p>
    </div>

    @if ($errors->any())
    <div
        class="bg-red-500/10 border border-red-500/50 text-red-400 p-4 rounded-xl text-sm mb-6 animate-fade-in backdrop-blur-md">
        Akses ditolak. Periksa kembali username dan password Anda.
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf
        <x-input type="text" name="username" placeholder="Username / Email">
            <x-slot name="icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </x-slot>
        </x-input>

        <x-input type="password" name="password" placeholder="Kata Sandi" :isPassword="true">
            <x-slot name="icon">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                    </path>
                </svg>
            </x-slot>
        </x-input>

        <div class="flex items-center justify-between mb-8 animate-fade-up" style="animation-delay: 0.2s;">
            <label
                class="flex items-center text-sm text-gray-400 cursor-pointer hover:text-white transition-colors group">
                <div
                    class="relative flex items-center justify-center mr-3 w-5 h-5 rounded border border-gray-600 bg-white/5 group-hover:border-blue-400 transition-colors">
                    <input type="checkbox" name="remember" class="peer opacity-0 absolute w-full h-full cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-blue-400 opacity-0 peer-checked:opacity-100 transition-opacity duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                Ingat Sesi Saya
            </label>
        </div>

        <button type="submit"
            class="w-full relative overflow-hidden group bg-blue-600 text-white rounded-xl py-3.5 px-8 text-sm font-bold tracking-wide transition-all duration-300 hover:bg-blue-500 hover:shadow-[0_0_25px_rgba(59,130,246,0.4)] hover:-translate-y-0.5 animate-fade-up"
            style="animation-delay: 0.3s;">
            <span class="relative z-10 flex items-center justify-center gap-2">
                Akses Dashboard
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </span>
        </button>
    </form>
</div>
@endsection