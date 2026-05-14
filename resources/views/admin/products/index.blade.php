@extends('admin.partials.master')
@section('title', 'Product Management')
@section('header_title', 'Inventory')

@push('styles')
<!-- Alpine.js untuk Dropdown -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Product Collection</h2>
        <p class="text-sm text-gray-500 mt-1">Manage your digital and physical inventory efficiently.</p>
    </div>

    <div class="flex items-center gap-3">
        <!-- Export Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" type="button" class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition-all shadow-sm">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>Export</span>
                <svg class="w-3 h-3 ml-1 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-xl z-50 py-2">
                <a href="{{ route('products.export', 'excel') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    Excel Spreadsheet
                </a>
                <a href="{{ route('products.export', 'pdf') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    PDF Document
                </a>
            </div>
        </div>

        <button type="button" onclick="formModal('add')" class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Add Product</span>
        </button>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    {{-- Search & Filter Section --}}
    <div class="p-4 border-b border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-gray-50/30">
        <div class="flex items-center gap-3">
            <form method="GET" action="{{ route('products.index') }}" class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Show</span>
                <select name="show" onchange="this.form.submit()" class="border border-gray-200 rounded-lg px-2 py-1.5 text-sm outline-none bg-white">
                    <option value="10" {{ request('show') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('show') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('show') == 50 ? 'selected' : '' }}>50</option>
                </select>
            </form>
        </div>
        <form method="GET" action="{{ route('products.index') }}" class="w-full lg:w-80">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or brand..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:border-blue-500 outline-none transition-all">
        </form>
    </div>

    {{-- Table Section --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-white border-b border-gray-100 text-[11px] uppercase tracking-wider text-gray-400 font-bold">
                    <th class="py-4 px-6">Preview</th>
                    <th class="py-4 px-6">Product Info</th>
                    <th class="py-4 px-6">Specifications</th>
                    <th class="py-4 px-6">Price</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $item)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="py-4 px-6">
                        <img src="{{ asset('product/' . $item->image) }}" class="w-14 h-14 object-cover rounded-xl shadow-sm border border-gray-100">
                    </td>
                    <td class="py-4 px-6">
                        <div class="font-bold text-gray-800 text-sm">{{ $item->name }}</div>
                        <div class="text-[10px] text-gray-400 uppercase font-black tracking-widest mt-0.5">{{ $item->brand }}</div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="text-xs text-gray-600">
                            <span class="block">CPU: {{ $item->processor ?? '-' }}</span>
                            <span class="block">RAM: {{ $item->ram ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-6 font-bold text-blue-600">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="py-4 px-6 text-right space-x-2 whitespace-nowrap">
                        {{-- Edit Button --}}
                        <button type="button" onclick="editModalFunc({{ $item }}, '{{ route('products.update', $item->hashid) }}')" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        {{-- Delete Button --}}
                        <button type="button" onclick="deleteModalFunc('{{ $item->hashid }}', '{{ addslashes($item->name) }}')" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-20 text-center text-gray-400 italic">No products found in inventory.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
    <div class="p-6 border-t border-gray-100 bg-gray-50/30">
        {{ $products->links() }}
    </div>
    @endif
</div>

@include('admin.products._modal')
@endsection

@push('scripts')
<script>
    function formModal(mode) {
        if (mode === 'add') {
            document.getElementById('productForm').reset();
            document.getElementById('productForm').action = "{{ route('products.store') }}";
            document.getElementById('method_field').innerHTML = '';
            document.getElementById('modalTitle').innerText = 'Add New Product';
            window.openModal('modalProductForm');
        }
    }

    function editModalFunc(data, updateUrl) {
        document.getElementById('productForm').action = updateUrl;
        document.getElementById('method_field').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('modalTitle').innerText = 'Edit Product';

        // Mapping Data to Inputs
        document.getElementsByName('name')[0].value = data.name;
        document.getElementsByName('brand')[0].value = data.brand;
        document.getElementsByName('price')[0].value = data.price;
        document.getElementsByName('processor')[0].value = data.processor;
        document.getElementsByName('ram')[0].value = data.ram;
        document.getElementsByName('description')[0].value = data.description;

        window.openModal('modalProductForm');
    }

    function deleteModalFunc(id, name) {
        document.getElementById('deleteName').innerText = name;
        let deleteUrl = "{{ route('products.destroy', ':id') }}".replace(':id', id);
        document.getElementById('deleteForm').action = deleteUrl;
        window.openModal('modalDelete');
    }
</script>
@endpush