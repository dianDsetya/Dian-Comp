<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product; // Ubah ke Model Product
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalViews = Product::sum('views');

        // Rata-rata interaksi (Popularitas per produk)
        $avgEngagement = $totalProducts > 0 ? ($totalViews / $totalProducts) : 0;

        // Ambil 5 produk dengan views terbanyak untuk Leaderboard
        $trendingProducts = Product::orderByDesc('views')->take(5)->get();

        // Data untuk Grafik Perbandingan (Ambil 7 produk terpopuler)
        $productsForChart = Product::orderByDesc('views')->take(7)->get();

        $chartLabels = $productsForChart->pluck('name'); // Nama produk untuk sumbu X
        $chartData = $productsForChart->pluck('views');   // Jumlah views untuk sumbu Y

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalProducts',
            'totalViews',
            'trendingProducts',
            'chartLabels',
            'chartData',
            'avgEngagement'
        ));
    }
}
