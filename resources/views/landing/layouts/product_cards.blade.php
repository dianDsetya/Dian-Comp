@foreach ($products as $item)
<a href="{{ route('products.show', $item->slug) }}" class="group">
    <div class="bg-white rounded-2xl md:rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden transition-all duration-500 hover:shadow-xl hover:-translate-y-2 h-full flex flex-col">
        <div class="relative aspect-square overflow-hidden bg-gray-50">
            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute top-2 left-2 md:top-4 md:left-4">
                <span class="bg-blue-600/90 backdrop-blur-sm text-white text-[7px] md:text-[9px] font-black px-1.5 py-0.5 md:px-2 md:py-1 rounded md:rounded-lg flex items-center gap-1 uppercase shadow-md">
                    {{ $item->brand }}
                </span>
            </div>
        </div>
        <div class="p-3 md:p-5 flex-grow flex flex-col justify-between">
            <div>
                <h3 class="text-xs md:text-base font-bold text-gray-800 leading-tight group-hover:text-blue-600 transition-colors line-clamp-2">
                    {{ $item->name }}
                </h3>
                <p class="text-[9px] md:text-[12px] text-blue-600 mt-2 font-black">
                    Rp {{ number_format($item->price, 0, ',', '.') }}
                </p>
            </div>
            <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-gray-50 flex items-center justify-between">
                <span class="text-[7px] md:text-[9px] text-gray-400 font-bold uppercase">
                    <i class="fas fa-eye mr-1 text-blue-300"></i> {{ $item->views ?? 0 }} Klik
                </span>
                <span class="text-blue-600 text-[8px] md:text-[10px] font-black tracking-widest group-hover:mr-1 transition-all">
                    DETAIL →
                </span>
            </div>
        </div>
    </div>
</a>
@endforeach