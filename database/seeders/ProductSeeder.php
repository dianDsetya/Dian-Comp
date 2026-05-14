<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $laptops = [
            // APPLE
            ['name' => 'MacBook Air M1 2020', 'brand' => 'Apple', 'cpu' => 'Apple M1', 'ram' => '8GB', 'price' => 12500000],
            ['name' => 'MacBook Air M2 2022', 'brand' => 'Apple', 'cpu' => 'Apple M2', 'ram' => '8GB', 'price' => 16500000],
            ['name' => 'MacBook Pro M3 14 inch', 'brand' => 'Apple', 'cpu' => 'Apple M3', 'ram' => '16GB', 'price' => 28000000],
        
            // ASUS
            ['name' => 'ASUS ROG Zephyrus G14', 'brand' => 'ASUS', 'cpu' => 'Ryzen 9 7940HS', 'ram' => '16GB', 'price' => 32000000],
            ['name' => 'ASUS TUF Gaming F15', 'brand' => 'ASUS', 'cpu' => 'Core i7-12700H', 'ram' => '16GB', 'price' => 15500000],
            ['name' => 'ASUS Vivobook 14X', 'brand' => 'ASUS', 'cpu' => 'Core i5-12500H', 'ram' => '8GB', 'price' => 9500000],
            ['name' => 'ASUS Zenbook S13 OLED', 'brand' => 'ASUS', 'cpu' => 'Ryzen 7 6800U', 'ram' => '16GB', 'price' => 21000000],

            // LENOVO
            ['name' => 'Lenovo Legion 5i Pro', 'brand' => 'Lenovo', 'cpu' => 'Core i7-13700H', 'ram' => '16GB', 'price' => 24000000],
            ['name' => 'Lenovo Yoga Slim 7i Carbon', 'brand' => 'Lenovo', 'cpu' => 'Core i7-1260P', 'ram' => '16GB', 'price' => 19000000],
            ['name' => 'Lenovo LOQ 15', 'brand' => 'Lenovo', 'cpu' => 'Core i5-13420H', 'ram' => '8GB', 'price' => 13000000],

            // HP
            ['name' => 'HP Victus 15', 'brand' => 'HP', 'cpu' => 'Core i5-13420H', 'ram' => '16GB', 'price' => 12800000],
            ['name' => 'HP Pavilion Aero 13', 'brand' => 'HP', 'cpu' => 'Ryzen 5 7535U', 'ram' => '16GB', 'price' => 11500000],

            // ACER
            ['name' => 'Acer Nitro V 15', 'brand' => 'Acer', 'cpu' => 'Core i5-13420H', 'ram' => '8GB', 'price' => 11000000],
            ['name' => 'Acer Swift Go 14', 'brand' => 'Acer', 'cpu' => 'Core i7-13700H', 'ram' => '16GB', 'price' => 14500000],
            ['name' => 'Acer Predator Helios Neo 16', 'brand' => 'Acer', 'cpu' => 'Core i7-13700HX', 'ram' => '16GB', 'price' => 23000000],

            // DELL
            ['name' => 'Dell Inspiron 14 5430', 'brand' => 'Dell', 'cpu' => 'Core i5-1335U', 'ram' => '8GB', 'price' => 11500000],
            ['name' => 'Dell Vostro 3430', 'brand' => 'Dell', 'cpu' => 'Core i3-1305U', 'ram' => '8GB', 'price' => 7800000],

            // MSI
            ['name' => 'MSI Katana 15', 'brand' => 'MSI', 'cpu' => 'Core i7-13620H', 'ram' => '16GB', 'price' => 17500000],
            ['name' => 'MSI Modern 14', 'brand' => 'MSI', 'cpu' => 'Ryzen 5 7530U', 'ram' => '8GB', 'price' => 7200000],

            // Tambahan Random untuk mencapai 50
            ['name' => 'Microsoft Surface Laptop 5', 'brand' => 'Microsoft', 'cpu' => 'Core i7-1255U', 'ram' => '16GB', 'price' => 24000000],
            ['name' => 'Huawei MateBook D14', 'brand' => 'Huawei', 'cpu' => 'Core i5-1155G7', 'ram' => '8GB', 'price' => 8500000],
            ['name' => 'Axioo Pongo 760', 'brand' => 'Axioo', 'cpu' => 'Core i7-12650H', 'ram' => '16GB', 'price' => 14000000],
            ['name' => 'Razer Blade 14', 'brand' => 'Razer', 'cpu' => 'Ryzen 9 7940HS', 'ram' => '16GB', 'price' => 42000000],
        ];

        foreach ($laptops as $laptop) {
            $slug = Str::slug($laptop['name']);
            Product::create([
                'name'        => $laptop['name'],
                'slug'        => $slug . '-' . rand(100, 999),
                'brand'       => $laptop['brand'],
                'processor'   => $laptop['cpu'],
                'ram'         => $laptop['ram'],
                'price'       => $laptop['price'],
                'description' => 'Laptop ' . $laptop['name'] . ' dengan performa ' . $laptop['cpu'] . ' cocok untuk kebutuhan harian dan profesional.',
                'image'       => $laptop['name'] . '.webp', // Nama gambar otomatis: macbook-air-m1-2020.jpg
                'views'       => rand(50, 500),   // Data view random untuk grafik dashboard
            ]);
        }
    }
}
