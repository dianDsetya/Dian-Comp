@extends('landing.layouts.product') {{-- Tetap gunakan layout yang sama --}}

@section('content')
<div class="min-h-screen flex flex-col bg-white">

    <!-- Header Section -->
    <header class="relative bg-[#f8f9fa] pt-8 pb-16 px-6 border-b border-gray-100">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-40">
            <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-100 rounded-full blur-3xl"></div>
            <div class="absolute top-0 -right-20 w-64 h-64 bg-sky-50 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <div class="flex justify-center mb-4">
                <div class="w-24 h-24 rounded-full bg-white shadow-md p-3 border border-white overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('logo/logo.png') }}" alt="Store Logo" class="w-full h-auto object-contain">
                </div>
            </div>

            <h1 class="text-2xl font-extrabold text-gray-900 flex items-center justify-center gap-2 tracking-tighter">
                Dian Computer
                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z" />
                </svg>
            </h1>
            <p class="text-gray-500 text-xs md:text-sm mt-1 font-medium max-w-sm mx-auto leading-snug">
                Katalog produk digital dan gadget terbaru. Kualitas terjamin untuk kebutuhan Anda.
            </p>

            <div class="mt-6 flex justify-center p-1 bg-gray-200/50 backdrop-blur-sm w-fit mx-auto rounded-full border border-gray-200">
                <a href="{{ url('/') }}" class="px-6 py-1.5 rounded-full text-[10px] md:text-xs font-bold transition-all {{ !request('sort') ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                    Terbaru
                </a>
                <a href="{{ url('/?sort=popular') }}" class="px-6 py-1.5 rounded-full text-[10px] md:text-xs font-bold transition-all {{ request('sort') == 'popular' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                    Terpopuler
                </a>
            </div>
        </div>
    </header>

    <!-- Search Bar -->
    <div class="max-w-4xl mx-auto w-full px-4 md:px-6 -mt-7 relative z-20">
        <form action="{{ url('/') }}" method="GET" class="relative group">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari produk atau merk..."
                class="w-full pl-10 md:pl-12 pr-6 py-3 md:py-4 bg-white border border-gray-100 rounded-2xl shadow-lg focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all outline-none text-xs md:text-sm font-medium">
            <i class="fas fa-search absolute left-4 md:left-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-blue-500 text-sm md:text-base transition-colors"></i>
        </form>
    </div>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto py-8 px-4 md:px-6 flex-grow">
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-[10px] md:text-xs font-black text-gray-400 uppercase tracking-widest">Daftar Produk</h2>
            <div class="h-px flex-grow bg-gray-100 ml-4"></div>
        </div>

        <!-- GRID 2 KOLOM DI MOBILE, 3 KOLOM DI DESKTOP -->
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
            @forelse ($products as $item)
            <a href="{{ route('products.show', $item->slug) }}" class="group">
                <div class="bg-white rounded-2xl md:rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 h-full flex flex-col">

                    <div class="relative aspect-square overflow-hidden bg-gray-50">
                        {{-- Path Gambar disesuaikan ke folder public/product/ --}}
                        <img src="{{ asset('product/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute top-2 left-2 md:top-4 md:left-4">
                            <span class="bg-blue-600/90 backdrop-blur-sm text-white text-[7px] md:text-[9px] font-black px-1.5 py-0.5 md:px-2 md:py-1 rounded md:rounded-lg flex items-center gap-1 uppercase shadow-md">
                                {{ $item->brand }}
                            </span>
                        </div>
                    </div>

                    <div class="p-3 md:p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-xs md:text-base font-bold text-gray-800 leading-tight group-hover:text-blue-600 transition-colors line-clamp-2">
                                {{ $item->name }}
                            </h3>
                            <p class="text-[9px] md:text-[12px] text-blue-600 mt-2 font-black">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-gray-50 flex items-center justify-between">
                            <span class="text-[7px] md:text-[9px] text-gray-400 font-bold uppercase">
                                <i class="fas fa-eye mr-1 text-blue-300"></i> {{ $item->views ?? 0 }} Klik
                            </span>
                            <span class="text-blue-600 text-[8px] md:text-[10px] font-black tracking-widest group-hover:mr-1 transition-all">
                                DETAIL →
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-16 bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200">
                <p class="text-gray-400 font-bold italic text-sm">Produk belum tersedia.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($products->hasMorePages())
        <div class="mt-12 text-center">
            <a href="{{ $products->nextPageUrl() }}" class="inline-flex items-center gap-2 bg-white border border-gray-200 px-8 py-3 rounded-full font-bold text-gray-600 shadow-sm hover:shadow-md hover:text-blue-600 transition-all text-[10px] md:text-xs">
                Lihat Lainnya <i class="fas fa-chevron-down text-[8px] md:text-[10px]"></i>
            </a>
        </div>
        @endif
    </main>

    @include('landing.layouts.footer')
</div>
@endsection