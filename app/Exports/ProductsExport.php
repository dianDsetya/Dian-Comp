<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return ['No', 'Product Name', 'Brand', 'Processor', 'RAM', 'Price (IDR)', 'Views'];
    }

    public function map($product): array
    {
        static $no = 1;
        return [
            $no++,
            $product->name,
            $product->brand,
            $product->processor,
            $product->ram,
            number_format($product->price, 0, ',', '.'),
            $product->views ?? 0,
        ];
    }
}
