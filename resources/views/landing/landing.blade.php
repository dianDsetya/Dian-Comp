@extends('landing.layouts.product')

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
                Katalog harga laptop terbaru. Temukan spesifikasi terbaik dengan harga bersaing.
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
            <h2 class="text-[10px] md:text-xs font-black text-gray-400 uppercase tracking-widest">Daftar Katalog</h2>
            <div class="h-px flex-grow bg-gray-100 ml-4"></div>
        </div>

        <!-- GRID WRAPPER -->
        <div id="product-list" class="grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-8">
            @include('landing.layouts.product_cards')
        </div>

        <!-- TOMBOL LIHAT LAINNYA -->
        <div id="load-more-section" class="mt-12 text-center {{ $products->hasMorePages() ? '' : 'hidden' }}">
            <button id="btn-load-more" data-next="{{ $products->nextPageUrl() }}"
                class="inline-flex items-center gap-2 bg-white border border-gray-200 px-8 py-3 rounded-full font-bold text-gray-600 shadow-sm hover:shadow-md hover:text-blue-600 transition-all text-[10px] md:text-xs">
                <span>Lihat Lainnya</span>
                <i class="fas fa-chevron-down text-[8px] md:text-[10px]"></i>
            </button>
        </div>
    </main>

    @include('landing.layouts.footer')
</div>

{{-- SCRIPT AJAX --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btn-load-more').on('click', function() {
            let btn = $(this);
            let url = btn.attr('data-next');

            if (!url) return;

            btn.find('span').text('Loading...');
            btn.prop('disabled', true);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    if (res.html) {
                        // Tambahkan item baru ke dalam list
                        $('#product-list').append(res.html);

                        // Update URL untuk halaman berikutnya
                        if (res.nextPage) {
                            btn.attr('data-next', res.nextPage);
                            btn.find('span').text('Lihat Lainnya');
                            btn.prop('disabled', false);
                        } else {
                            // Jika sudah habis, sembunyikan tombol
                            $('#load-more-section').fadeOut();
                        }
                    }
                },
                error: function() {
                    alert('Gagal mengambil data.');
                    btn.find('span').text('Lihat Lainnya');
                    btn.prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection