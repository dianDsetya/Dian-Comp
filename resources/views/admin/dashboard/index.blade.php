@extends('admin.partials.master')

@push('styles')
<style>
    .stat-card {
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: #3b82f6;
        box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.05);
    }
</style>
@endpush

@section('content')
<div class="space-y-8 pb-10">

    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight flex items-center gap-3">
                Dashboard Analisa
                <span class="px-3 py-1 text-[10px] bg-blue-600 text-white rounded-full uppercase tracking-widest">Live</span>
            </h1>
            <p class="text-sm text-slate-400 font-medium">Pantau performa dan statistik inventaris produk Anda</p>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="stat-card bg-white p-6 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Produk</p>
            <h3 class="text-3xl font-black text-slate-800">{{ $totalProducts }}</h3>
            <div class="mt-2 flex items-center gap-1 text-[10px] font-bold text-indigo-500">
                <i class="fas fa-box"></i> Item Tersedia
            </div>
        </div>

        <div class="stat-card bg-white p-6 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Dilihat</p>
            <h3 class="text-3xl font-black text-slate-800">{{ number_format($totalViews) }}</h3>
            <div class="mt-2 flex items-center gap-1 text-[10px] font-bold text-blue-500">
                <i class="fas fa-eye"></i> Total Klik Produk
            </div>
        </div>

        <div class="stat-card bg-white p-6 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Engagement</p>
            <h3 class="text-3xl font-black text-slate-800">{{ number_format($avgEngagement, 1) }}</h3>
            <div class="mt-2 flex items-center gap-1 text-[10px] font-bold text-orange-500">
                <i class="fas fa-chart-line"></i> Klik Per Produk
            </div>
        </div>

        <div class="stat-card bg-white p-6 rounded-[2rem] shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Admin</p>
            <h3 class="text-3xl font-black text-slate-800">{{ $totalUsers }}</h3>
            <div class="mt-2 flex items-center gap-1 text-[10px] font-bold text-slate-400">
                <i class="fas fa-user-shield"></i> Pengelola Sistem
            </div>
        </div>
    </div>

    <!-- Analisa Per Produk -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Grafik Batang -->
        <div class="lg:col-span-2 bg-white p-8 rounded-[3rem] shadow-sm border border-slate-50">
            <div class="mb-8">
                <h3 class="text-lg font-black text-slate-800">Popularitas Produk</h3>
                <p class="text-xs text-slate-400 font-medium">Berdasarkan jumlah klik pada tiap produk terdaftar</p>
            </div>
            <div id="productBarChart" class="w-full h-80"></div>
        </div>

        <!-- Leaderboard: Produk Teratas -->
        <div class="bg-slate-900 p-8 rounded-[3rem] shadow-xl text-white">
            <h3 class="text-lg font-black mb-8 flex items-center gap-3">
                <svg class="w-5 h-5 text-blue-500 fill-current" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                Top Ranking
            </h3>

            <div class="space-y-6">
                @foreach($trendingProducts as $index => $trend)
                <div class="flex items-center gap-4 group">
                    <div class="relative shrink-0">
                        {{-- Path gambar produk --}}
                        <img src="{{ asset('product/' . $trend->image) }}" class="w-12 h-12 rounded-xl object-cover border border-white/10 group-hover:border-blue-500 transition-all">
                        <div class="absolute -top-2 -left-2 w-5 h-5 bg-blue-600 rounded flex items-center justify-center text-[9px] font-black">{{ $index + 1 }}</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-xs font-bold truncate group-hover:text-blue-400 transition-colors">{{ $trend->name }}</h4>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-[9px] text-slate-500 font-bold uppercase">{{ $trend->brand }}</span>
                            <span class="text-[10px] font-black text-blue-400">{{ number_format($trend->views) }} klik</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 p-4 bg-white/5 rounded-2xl border border-white/10">
                <h5 class="text-[10px] font-black uppercase text-blue-500 mb-2">Insight</h5>
                <p class="text-[11px] text-slate-400 leading-relaxed italic">
                    "Produk <strong>{{ $trendingProducts->first()->name ?? '-' }}</strong> menjadi item yang paling banyak dicari saat ini."
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new ApexCharts(document.querySelector("#productBarChart"), {
            series: [{
                name: 'Total Klik',
                data: @json($chartData)
            }],
            chart: {
                type: 'bar',
                height: 320,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 12,
                    columnWidth: '45%',
                    distributed: true,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            colors: ['#3b82f6', '#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f59e0b', '#10b981'],
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '10px',
                    colors: ["#64748b"],
                    fontWeight: 800
                }
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: @json($chartLabels),
                labels: {
                    style: {
                        colors: '#94a3b8',
                        fontSize: '10px',
                        fontWeight: 700
                    },
                    rotate: -45,
                    trim: true
                }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4
            },
            tooltip: {
                theme: 'light'
            }
        }).render();
    });
</script>
@endpush