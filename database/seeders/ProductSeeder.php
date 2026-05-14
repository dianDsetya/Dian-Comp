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
            [
                'name' => 'MacBook Air M1 2020',
                'brand' => 'Apple',
                'cpu' => 'Apple M1',
                'ram' => '8GB',
                'price' => 12500000,
                'description' => 'Ultrabook revolusioner tanpa kipas (fanless) yang sangat sunyi. Menawarkan daya tahan baterai luar biasa dan performa mulus untuk produktivitas harian, pelajar, dan pekerja kantoran.'
            ],
            [
                'name' => 'MacBook Air M2 2022',
                'brand' => 'Apple',
                'cpu' => 'Apple M2',
                'ram' => '8GB',
                'price' => 16500000,
                'description' => 'Hadir dengan desain sasis baru yang lebih modern, layar Liquid Retina yang lebih cerah, dan kembalinya port MagSafe. Sangat portabel dengan performa ekstra dari chip M2.'
            ],
            [
                'name' => 'MacBook Pro M3 14 inch',
                'brand' => 'Apple',
                'cpu' => 'Apple M3',
                'ram' => '16GB',
                'price' => 28000000,
                'description' => 'Laptop kelas profesional dengan performa grafis tinggi dan layar Mini-LED (ProMotion 120Hz). Pilihan utama untuk kreator konten, video editor, dan software developer.'
            ],

            // ASUS
            [
                'name' => 'ASUS ROG Zephyrus G14',
                'brand' => 'ASUS',
                'cpu' => 'Ryzen 9 7940HS',
                'ram' => '16GB',
                'price' => 32000000,
                'description' => 'Laptop gaming premium ultra-ringan 14 inci. Menggabungkan performa buas kelas atas dengan mobilitas tinggi, dilengkapi fitur AniMe Matrix atau layar ROG Nebula yang memukau.'
            ],
            [
                'name' => 'ASUS TUF Gaming F15',
                'brand' => 'ASUS',
                'cpu' => 'Core i7-12700H',
                'ram' => '16GB',
                'price' => 15500000,
                'description' => 'Laptop gaming tangguh berstandar militer (MIL-STD-810H). Memberikan performa gaming 1080p yang solid dengan harga yang kompetitif, cocok untuk gamer e-sports.'
            ],
            [
                'name' => 'ASUS Vivobook 14X',
                'brand' => 'ASUS',
                'cpu' => 'Core i5-12500H',
                'ram' => '8GB',
                'price' => 9500000,
                'description' => 'Laptop harian bertenaga prosesor seri-H yang biasanya ada di laptop gaming. Sangat ideal untuk mahasiswa dan pekerja yang butuh kecepatan ekstra untuk multitasking berat.'
            ],
            [
                'name' => 'ASUS Zenbook S13 OLED',
                'brand' => 'ASUS',
                'cpu' => 'Ryzen 7 6800U',
                'ram' => '16GB',
                'price' => 21000000,
                'description' => 'Laptop ultra-premium yang sangat tipis dan ringan. Mengusung layar OLED memanjakan mata, dirancang khusus bagi para eksekutif dan profesional yang mobile.'
            ],

            // LENOVO
            [
                'name' => 'Lenovo Legion 5i Pro',
                'brand' => 'Lenovo',
                'cpu' => 'Core i7-13700H',
                'ram' => '16GB',
                'price' => 24000000,
                'description' => 'Mesin gaming kelas berat dengan sistem pendingin Coldfront terdepan. Layar rasio 16:10 memanjakan visual, cocok untuk gamer hardcore dan kreator 3D.'
            ],
            [
                'name' => 'Lenovo Yoga Slim 7i Carbon',
                'brand' => 'Lenovo',
                'cpu' => 'Core i7-1260P',
                'ram' => '16GB',
                'price' => 19000000,
                'description' => 'Dibuat dengan material karbon yang membuatnya sangat ringan namun kuat. Cocok untuk mobilitas tingkat tinggi tanpa mengorbankan performa komputasi.'
            ],
            [
                'name' => 'Lenovo LOQ 15',
                'brand' => 'Lenovo',
                'cpu' => 'Core i5-13420H',
                'ram' => '8GB',
                'price' => 13000000,
                'description' => 'Lini laptop gaming entry-level penerus IdeaPad Gaming. Menawarkan keseimbangan apik antara harga dan performa gaming AAA di pengaturan grafis menengah.'
            ],

            // HP
            [
                'name' => 'HP Victus 15',
                'brand' => 'HP',
                'cpu' => 'Core i5-13420H',
                'ram' => '16GB',
                'price' => 12800000,
                'description' => 'Hadir dengan desain elegan dan tidak terlalu mencolok seperti laptop gaming pada umumnya. Cocok untuk casual gamer yang juga menggunakan laptopnya untuk bekerja atau kuliah.'
            ],
            [
                'name' => 'HP Pavilion Aero 13',
                'brand' => 'HP',
                'cpu' => 'Ryzen 5 7535U',
                'ram' => '16GB',
                'price' => 11500000,
                'description' => 'Laptop super ringan (kurang dari 1 kg) di kelas menengah. Solusi sempurna bagi yang mencari ultrabook murah untuk mengetik dan mobilitas tinggi.'
            ],

            // ACER
            [
                'name' => 'Acer Nitro V 15',
                'brand' => 'Acer',
                'cpu' => 'Core i5-13420H',
                'ram' => '8GB',
                'price' => 11000000,
                'description' => 'Pilihan laptop gaming budget yang paling dicari. Mampu melibas game kompetitif masa kini berkat kombinasi prosesor kencang dan kartu grafis diskrit terkini.'
            ],
            [
                'name' => 'Acer Swift Go 14',
                'brand' => 'Acer',
                'cpu' => 'Core i7-13700H',
                'ram' => '16GB',
                'price' => 14500000,
                'description' => 'Laptop produktivitas dengan sertifikasi Intel Evo. Menawarkan responsivitas instan, layar brilian, dan performa mulus untuk aplikasi desain grafis ringan hingga menengah.'
            ],
            [
                'name' => 'Acer Predator Helios Neo 16',
                'brand' => 'Acer',
                'cpu' => 'Core i7-13700HX',
                'ram' => '16GB',
                'price' => 23000000,
                'description' => 'Varian yang lebih terjangkau dari seri flagship Predator Helios. Ditenagai prosesor HX-series kelas desktop untuk performa gaming kompetitif dan rendering berat tanpa kompromi.'
            ],

            // DELL
            [
                'name' => 'Dell Inspiron 14 5430',
                'brand' => 'Dell',
                'cpu' => 'Core i5-1335U',
                'ram' => '8GB',
                'price' => 11500000,
                'description' => 'Laptop harian yang solid dengan build quality khas Dell yang awet. Sangat pas untuk kebutuhan administrasi kantoran, belajar online, dan hiburan.'
            ],
            [
                'name' => 'Dell Vostro 3430',
                'brand' => 'Dell',
                'cpu' => 'Core i3-1305U',
                'ram' => '8GB',
                'price' => 7800000,
                'description' => 'Dirancang khusus untuk bisnis kecil dan UMKM. Menawarkan fitur keamanan dasar yang baik, performa stabil, dan keandalan untuk menyelesaikan tugas-tugas esensial.'
            ],

            // MSI
            [
                'name' => 'MSI Katana 15',
                'brand' => 'MSI',
                'cpu' => 'Core i7-13620H',
                'ram' => '16GB',
                'price' => 17500000,
                'description' => 'Mengusung tema desain terinspirasi dari pedang naga. Laptop gaming mid-range ini dilengkapi pendingin Cooler Boost 5 untuk menjaga suhu tetap stabil saat bermain game berat.'
            ],
            [
                'name' => 'MSI Modern 14',
                'brand' => 'MSI',
                'cpu' => 'Ryzen 5 7530U',
                'ram' => '8GB',
                'price' => 7200000,
                'description' => 'Laptop tipis dan stylish yang ditujukan untuk kawula muda, pelajar, dan mahasiswa. Performa mumpuni untuk multitasking ringan dengan bobot yang mudah dibawa-bawa.'
            ],

            // TAMBAHAN
            [
                'name' => 'Microsoft Surface Laptop 5',
                'brand' => 'Microsoft',
                'cpu' => 'Core i7-1255U',
                'ram' => '16GB',
                'price' => 24000000,
                'description' => 'Pengalaman murni OS Windows dalam balutan sasis premium berbahan logam dan layar sentuh PixelSense. Elegan, profesional, dan menunjang estetika tinggi.'
            ],
            [
                'name' => 'Huawei MateBook D14',
                'brand' => 'Huawei',
                'cpu' => 'Core i5-1155G7',
                'ram' => '8GB',
                'price' => 8500000,
                'description' => 'Menghadirkan desain metal unibody ala laptop premium dengan harga bersahabat. Dilengkapi fitur Super Device yang sangat mulus jika dipadukan dengan ekosistem perangkat Huawei lainnya.'
            ],
            [
                'name' => 'Axioo Pongo 760',
                'brand' => 'Axioo',
                'cpu' => 'Core i7-12650H',
                'ram' => '16GB',
                'price' => 14000000,
                'description' => 'Laptop gaming kebanggaan brand lokal yang merusak harga pasar. Memberikan rasio harga berbanding performa (price-to-performance) paling gahar di kelasnya.'
            ],
            [
                'name' => 'Razer Blade 14',
                'brand' => 'Razer',
                'cpu' => 'Ryzen 9 7940HS',
                'ram' => '16GB',
                'price' => 42000000,
                'description' => 'Dijuluki sebagai "MacBook-nya laptop gaming". Sasis CNC Aluminum yang sangat kokoh dan tipis, menampung jeroan kelas atas bagi gamer enthusiast dan kreator profesional.'
            ],
        ];

        foreach ($laptops as $laptop) {
            // Slug dibuat berdasarkan nama laptop
            $slug = Str::slug($laptop['name']);

            Product::create([
                'name'        => $laptop['name'],
                'slug'        => $slug . '-' . rand(100, 999),
                'brand'       => $laptop['brand'],
                'processor'   => $laptop['cpu'],
                'ram'         => $laptop['ram'],
                'price'       => $laptop['price'],
                'description' => $laptop['description'], // Diambil langsung dari array
                'image'       => $laptop['name'] . '.webp', // Menggunakan nama laptop agar penamaan file rapi
                'views'       => rand(50, 500),
            ]);
        }
    }
}
