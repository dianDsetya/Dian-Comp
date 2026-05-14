<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Dian Computer')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body
    class="bg-gray-50 text-gray-800 font-sans antialiased flex h-screen overflow-hidden selection:bg-[#84cc16] selection:text-white relative">

    <div id="sidebar-overlay"
        class="fixed inset-0 bg-transparent z-40 hidden opacity-0 transition-opacity duration-300 md:hidden cursor-pointer">
    </div>

    @include('admin.partials.sidebar')

    <div class="flex-1 flex flex-col h-screen min-w-0 w-full transition-all duration-300 bg-gray-50 relative"
        id="main-content">

        <main id="main-scroll" class="flex-1 overflow-x-hidden overflow-y-auto scrollbar-hide relative">

            @include('admin.partials.header')

            <div class="p-4 md:p-6 min-h-screen flex flex-col">
                <div class="flex-1">
                    @yield('content')
                </div>

                <div class="mt-auto pt-8">
                    @include('admin.partials.footbar')
                </div>
            </div>

        </main>
    </div>

    <div id="global-modals-container">
        <x-modal id="modalLogout" maxWidth="sm">
            <div class="text-center">
                <div
                    class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-4 border border-red-100">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Keluar</h3>
                <p class="text-sm text-gray-500">Apakah Anda yakin ingin keluar dari sesi dashboard Admin ini?</p>
            </div>

            <x-slot name="footer">
                <form method="POST" action="{{ route('logout') }}" class="w-full flex gap-3">
                    @csrf
                    <button type="button" onclick="closeModal('modalLogout')"
                        class="w-1/2 px-5 py-2.5 text-sm font-semibold text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-xl transition-colors cursor-pointer">
                        Batal
                    </button>
                    <button type="submit"
                        class="w-1/2 px-5 py-2.5 text-sm font-bold bg-red-500 text-white rounded-xl hover:bg-red-600 hover:shadow-[0_0_15px_rgba(239,68,68,0.4)] transition-all cursor-pointer">
                        Ya, Keluar
                    </button>
                </form>
            </x-slot>
        </x-modal>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{!! session("success") !!}',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'rounded-[1.5rem] shadow-2xl border border-slate-100'
                    }
                });
            }
            @endif

            @if(session('error'))
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{!! session("error") !!}',
                    customClass: {
                        popup: 'rounded-[1.5rem] shadow-2xl border border-slate-100',
                        confirmButton: 'rounded-xl px-6 py-2 font-bold bg-red-500 hover:bg-red-600 text-white transition-colors'
                    }
                });
            }
            @endif
        });
    </script>
    @stack('scripts')
</body>

</html>