<footer class="w-full bg-[#f8f9fa] py-16 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <!-- Brand Footer -->
        <div class="mb-10">
            <h2 class="text-xl font-black text-gray-900 tracking-tighter uppercase">Dian<span class="text-blue-600">COMPUTER</span></h2>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Individual Project • Gadget & Laptop Catalog</p>
        </div>

        <!-- GRID KONTAK: 1 kolom di mobile, 3 di desktop -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-6 w-full max-w-4xl mx-auto">
            @php
            $contacts = [
            [
            'name' => 'WhatsApp',
            'icon' => 'fa-whatsapp',
            'url' => 'https://wa.me/62882005785262',
            'label' => 'Chat Admin'
            ],
            [
            'name' => 'Email',
            'icon' => 'fa-envelope',
            'url' => 'mailto:ddiandwisetya09@gmail.com', // Ganti dengan email-mu
            'label' => 'Send Message'
            ],
            [
            'name' => 'GitHub',
            'icon' => 'fa-github',
            'url' => 'https://github.com/username/repository', // Ganti dengan link github-mu
            'label' => 'Source Code'
            ],
            ];
            @endphp

            @foreach($contacts as $c)
            <a href="{{ $c['url'] }}" target="_blank"
                class="flex items-center justify-between bg-white p-5 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center group-hover:bg-blue-50 transition shrink-0">
                        <i class="fab {{ $c['icon'] }} {{ $c['name'] == 'Email' ? 'fas' : '' }} text-gray-400 group-hover:text-blue-600 text-base"></i>
                    </div>
                    <div class="text-left">
                        <span class="block font-black text-gray-900 text-xs uppercase tracking-tight">{{ $c['name'] }}</span>
                        <span class="block text-[10px] text-gray-400 font-medium">{{ $c['label'] }}</span>
                    </div>
                </div>

                <i class="fas fa-arrow-right text-[10px] text-gray-200 group-hover:text-blue-400 transition"></i>
            </a>
            @endforeach
        </div>

        <!-- Copyright & Credits -->
        <div class="mt-16 pt-8 border-t border-gray-200">
            <p class="text-[10px] text-gray-300 font-black tracking-[0.4em] uppercase">
                © {{ date('Y') }} Dian Computer • DESIGNED BY Dian Dwi Setya
            </p>
            <div class="flex justify-center gap-4 mt-4 opacity-30 grayscale">
                {{-- Logo sekolah atau instansi bisa ditaruh di sini jika perlu --}}
            </div>
        </div>
    </div>
</footer>