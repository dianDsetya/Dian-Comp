{{-- MODAL ADD / EDIT PRODUCT --}}
<x-modal id="modalProductForm" maxWidth="md">
    <x-slot name="title"><span id="modalTitle" class="font-black text-gray-800">Add New Product</span></x-slot>

    <form id="productForm" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div id="method_field"></div>

        <div class="space-y-4">
            {{-- Name --}}
            <div>
                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-wider">Product Name</label>
                <input type="text" name="name" required placeholder="e.g. MacBook Pro M3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none bg-gray-50 text-sm shadow-inner transition-all">
            </div>

            {{-- Brand & Price --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-wider">Brand</label>
                    <input type="text" name="brand" required placeholder="e.g. Apple" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none bg-gray-50 text-sm shadow-inner">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-wider">Price (IDR)</label>
                    <input type="number" name="price" required placeholder="0" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none bg-gray-50 text-sm shadow-inner">
                </div>
            </div>

            {{-- Specs (Flexible) --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-wider">Processor</label>
                    <input type="text" name="processor" placeholder="e.g. Intel i7" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none bg-gray-50 text-sm shadow-inner">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-wider">RAM / Storage</label>
                    <input type="text" name="ram" placeholder="e.g. 16GB" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none bg-gray-50 text-sm shadow-inner">
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-wider">Short Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none bg-gray-50 text-sm shadow-inner"></textarea>
            </div>

            {{-- Image Upload --}}
            <div class="p-4 bg-blue-50 rounded-2xl border border-blue-100">
                <label class="block text-[11px] font-black text-blue-500 uppercase mb-2 tracking-wider text-center">Product Thumbnail Image</label>
                <input type="file" name="image" accept="image/*" class="w-full text-xs text-gray-500 file:bg-blue-600 file:text-white file:border-0 file:rounded-lg file:px-4 file:py-1.5 file:font-bold cursor-pointer transition-all">
                <p class="text-[9px] text-gray-400 mt-2 italic text-center">*Format: JPG, PNG, WEBP. Max: 2MB</p>
            </div>
        </div>

        <div class="mt-8 flex gap-3 justify-end border-t border-gray-100 pt-6">
            <button type="button" onclick="closeModal('modalProductForm')" class="px-5 py-2.5 text-xs font-bold text-gray-400 hover:text-gray-600 transition-colors uppercase">Cancel</button>
            <button type="submit" class="px-8 py-2.5 text-xs font-black bg-blue-600 text-white rounded-xl shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all uppercase tracking-widest">
                Save Product
            </button>
        </div>
    </form>
</x-modal>

{{-- MODAL DELETE CONFIRMATION --}}
<x-modal id="modalDelete" maxWidth="sm">
    <div class="text-center p-2">
        <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </div>
        <h3 class="text-lg font-black text-gray-900">Remove Product?</h3>
        <p class="text-xs text-gray-400 mt-2 leading-relaxed">You are about to delete <span id="deleteName" class="font-bold text-gray-800 underline"></span>. This action cannot be undone.</p>

        <form id="deleteForm" method="POST" action="" class="mt-8 flex gap-3 justify-center border-t border-gray-100 pt-6">
            @csrf @method('DELETE')
            <button type="button" onclick="closeModal('modalDelete')" class="flex-1 px-5 py-2.5 text-xs font-bold text-gray-400 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all">
                CANCEL
            </button>
            <button type="submit" class="flex-1 px-5 py-2.5 text-xs font-black bg-red-600 text-white rounded-xl shadow-lg hover:bg-red-700 transition-all">
                DELETE NOW
            </button>
        </form>
    </div>
</x-modal>