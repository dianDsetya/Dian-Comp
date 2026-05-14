<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Product; // Ubah ke model Product
use Illuminate\Http\Request;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');
        $sort = $request->get('sort');

        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('brand', 'like', '%' . $search . '%');
        }

        if ($sort == 'popular') {
            $query->orderByDesc('views');
        } else {
            $query->latest();
        }

        $products = $query->paginate(7)->withQueryString();

        // JIKA PERMINTAAN AJAX (Tombol Lihat Lainnya diklik)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('landing.layouts.product_cards', compact('products'))->render(),
                'nextPage' => $products->nextPageUrl()
            ]);
        }

        return view('landing.landing', compact('products', 'search'));
    }

    public function showProduct(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Tambah views untuk hitungan populer
        $product->increment('views');

        // --- SISTEM REKOMENDASI ---
        // 1. Cari produk dengan BRAND yang sama
        $recommendations = Product::where('brand', $product->brand)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        // 2. Jika produk dengan brand sama kurang dari 4, cari berdasarkan rentang harga yang mirip (selisih 20%)
        if ($recommendations->count() < 4) {
            $priceMin = $product->price * 0.8;
            $priceMax = $product->price * 1.2;

            $extraRecs = Product::where('id', '!=', $product->id)
                ->whereNotIn('id', $recommendations->pluck('id')) // Jangan ambil yang sudah ada di list brand
                ->whereBetween('price', [$priceMin, $priceMax])
                ->take(4 - $recommendations->count())
                ->get();

            $recommendations = $recommendations->merge($extraRecs);
        }

        return view('landing.products.show', compact('product', 'recommendations'));
    }
}
