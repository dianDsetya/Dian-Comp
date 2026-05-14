<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $show = $request->input('show', 10);
        $query = Product::latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%");
        }

        $products = $query->paginate($show)->appends($request->all());
        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            // Simpan ke public/product/
            $file->move(public_path('product'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'brand' => $request->brand,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Product berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $data = $request->only(['name', 'brand', 'processor', 'ram', 'price', 'description']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di public/product/
            if ($product->image && File::exists(public_path('product/' . $product->image))) {
                File::delete(public_path('product/' . $product->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('product'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);
        return redirect()->back()->with('success', 'Product diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path('product/' . $product->image))) {
            File::delete(public_path('product/' . $product->image));
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product berhasil dihapus!');
    }

    public function export($type)
    {
        $products = Product::all();

        // Data untuk PDF & Print
        $data = $products->map(function ($item, $index) {
            return [
                'no'           => $index + 1,
                'name'         => $item->name,
                'brand'        => $item->brand,
                'processor'    => $item->processor,
                'ram'          => $item->ram,
                'price'        => 'Rp ' . number_format($item->price, 0, ',', '.'),
                'views'        => $item->views ?? 0,
            ];
        });

        switch ($type) {
            case 'excel':
                return Excel::download(new ProductsExport, 'products-ozaracomp.xlsx');
            case 'pdf':
                $pdf = Pdf::loadView('admin.products.export-pdf', compact('data'));
                return $pdf->download('katalog-produk-ozaracomp.pdf');
            default:
                abort(404);
        }
    }
}
