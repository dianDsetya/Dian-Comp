@extends('landing.layouts.product')

@push('styles')
<style>
    body {
        background-color: #ffffff;
    }

    .product-detail-card {
        background: radial-gradient(circle at top right, #f8fafc 0%, #ffffff 100%);
        border-radius: 3rem;
        border: 1px solid #f1f5f9;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen py-8 md:py-12 px-4">

    {{-- TOMBOL BACK --}}
    <div class="max-w-6xl mx-auto mb-6">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-blue-600 font-bold text-xs uppercase tracking-widest transition-all group">
            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-blue-50 transition-all">
                <i class="fas fa-arrow-left"></i>
            </div>
            <span>Kembali ke Katalog</span>
        </a>
    </div>

    {{-- CARD UTAMA DETAIL PRODUK --}}
    <div class="max-w-6xl mx-auto product-detail-card p-6 md:p-12 shadow-2xl mb-20">
        <div class="flex flex-col lg:flex-row gap-12 items-center">

            {{-- Bagian Gambar Produk --}}
            <div class="w-full lg:w-1/2">
                <div class="rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-50 bg-white">
                    {{-- Menggunakan Accessor image_url agar support link seeder --}}
                    <img src="{{ $product->image_url }}" class="w-full h-auto object-cover">
                </div>
            </div>

            {{-- Bagian Informasi Produk --}}
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <span class="text-blue-600 font-black tracking-[0.4em] text-[10px] uppercase">Official {{ $product->brand }}</span>
                <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight mt-2">{{ $product->name }}</h1>
                <p class="text-3xl text-blue-600 font-black mt-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                {{-- Spesifikasi --}}
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Processor</p>
                        <p class="font-bold text-slate-800 text-sm">{{ $product->processor ?? '-' }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">RAM / Memory</p>
                        <p class="font-bold text-slate-800 text-sm">{{ $product->ram ?? '-' }}</p>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="mt-6 text-gray-500 text-sm leading-relaxed">
                    {{ $product->description }}
                </div>

                <div class="pt-10">
                    <a href="https://wa.me/62882005785262?text=Halo, saya tertarik dengan produk {{ $product->name }}" target="_blank"
                        class="w-full lg:w-fit bg-green-500 text-white px-12 py-5 rounded-[2rem] font-bold text-lg shadow-xl hover:bg-green-600 transition-all flex items-center justify-center gap-3">
                        <i class="fab fa-whatsapp"></i> Hubungi Penjual
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- BAGIAN REKOMENDASI --}}
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <h2 class="text-xl font-black text-slate-900 uppercase tracking-tighter">Produk Rekomendasi</h2>
            <div class="h-px flex-grow bg-gray-100"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach ($recommendations as $rec)
            <a href="{{ route('products.show', $rec->slug) }}" class="group">
                <div class="bg-white p-3 rounded-3xl border border-gray-100 shadow-sm hover:shadow-lg transition-all flex flex-col h-full">
                    <div class="aspect-square overflow-hidden rounded-2xl mb-4">
                        {{-- Menggunakan Accessor image_url --}}
                        <img src="{{ $rec->image_url }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                    </div>
                    <h3 class="text-xs font-bold text-slate-800 line-clamp-2 group-hover:text-blue-600 px-1">{{ $rec->name }}</h3>
                    <p class="text-[10px] text-blue-600 font-black mt-2 px-1 mb-2">Rp {{ number_format($rec->price, 0, ',', '.') }}</p>

                    <div class="mt-auto pt-2 border-t border-gray-50 text-[8px] font-black text-gray-300 uppercase px-1">
                        {{ $rec->brand }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection