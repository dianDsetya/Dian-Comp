@extends('admin.partials.master')
@section('title', 'Manajemen Admin - Dian Computer')
@section('header_title', 'Manajemen Admin')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Daftar Admin</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola data administrator sistem Dian Computer.</p>
    </div>

    <button type="button" onclick="formModal('add')"
        class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 hover:shadow-[0_0_15px_rgba(37,99,235,0.4)] transition-all shrink-0">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Tambah Admin Baru
    </button>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    <div
        class="p-4 border-b border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-gray-50/50">
        <div class="flex flex-wrap items-center gap-3">
            <form method="GET" action="{{ route('users.index') }}" class="flex items-center gap-2" id="formShowData">
                @if (request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <span class="text-sm text-gray-600">Tampilkan</span>
                <select name="show" onchange="document.getElementById('formShowData').submit()"
                    class="border border-gray-200 rounded-lg px-2 py-1.5 text-sm focus:ring-blue-500 focus:border-blue-500 outline-none bg-white cursor-pointer">
                    <option value="10" {{ request('show') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('show') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('show') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('show') == 100 ? 'selected' : '' }}>100</option>
                </select>
                <span class="text-sm text-gray-600 hidden sm:inline">data</span>
            </form>

            <div class="h-6 w-px bg-gray-300 hidden sm:block"></div>

            {{-- EXPORT & IMPORT (BLUE THEME) --}}
            <div class="flex items-center gap-2 relative">
                {{-- BUTTON EXPORT --}}
                <button type="button" onclick="toggleExportMenu()"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-semibold text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-600 hover:text-white transition-colors border border-blue-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                </button>

                {{-- DROPDOWN --}}
                <div id="exportMenu"
                    class="hidden absolute top-full mt-2 bg-white border border-gray-200 rounded-xl shadow-lg text-sm z-50 overflow-hidden min-w-[120px]">
                    <a href="{{ route('users.export', 'excel') }}"
                        class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Excel</a>
                    <a href="{{ route('users.export', 'csv') }}"
                        class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">CSV</a>
                    <a href="{{ route('users.export', 'pdf') }}"
                        class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">PDF</a>
                    <a href="{{ route('users.export', 'print') }}" target="_blank"
                        class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 border-t border-gray-50">Print</a>
                </div>

                {{-- IMPORT --}}
                <button type="button" onclick="openModal('importModal')"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-semibold text-emerald-600 bg-emerald-50 rounded-lg hover:bg-emerald-600 hover:text-white transition-colors border border-emerald-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    Import
                </button>
            </div>
        </div>

        <form method="GET" action="{{ route('users.index') }}" class="w-full lg:w-72">
            @if (request('show'))
            <input type="hidden" name="show" value="{{ request('show') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..."
                class="w-full px-4 py-2 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-sm bg-white shadow-sm">
            <button type="submit" class="hidden"></button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white border-b border-gray-100 text-sm text-gray-500">
                    <th class="py-4 px-6 font-semibold">Nama Lengkap</th>
                    <th class="py-4 px-6 font-semibold">Email</th>
                    <th class="py-4 px-6 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="py-4 px-6 font-medium text-gray-800">
                        {{ $user->name }}
                        @if (auth('admin')->id() == $user->id)
                        <span
                            class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-600 border border-blue-200">
                            Anda
                        </span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-gray-600">
                        {{ $user->email }}
                    </td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <button
                            onclick="formModal('edit', '{{ $user->hashid }}', '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}')"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-50 text-amber-500 hover:bg-amber-500 hover:text-white transition-colors"
                            title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </button>

                        @if (auth('admin')->id() != $user->id)
                        <button
                            onclick="deleteModalFunc('{{ $user->hashid }}', '{{ addslashes($user->name) }}')"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-colors"
                            title="Hapus">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                        @else
                        <button disabled
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-gray-300 cursor-not-allowed"
                            title="Tidak dapat menghapus akun sendiri">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-12 text-center text-gray-500 bg-white italic">
                        Belum ada data admin terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($users->hasPages())
    <div class="p-4 border-t border-gray-100 bg-white">
        {{ $users->links() }}
    </div>
    @endif
</div>

{{-- MODAL IMPORT --}}
<x-modal id="importModal" maxWidth="sm">
    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="text-center p-2">
            <div
                class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 border border-blue-100">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Import Data Admin</h3>
            <p class="text-sm text-gray-500 mb-6">Upload file Excel (.xlsx / .csv) untuk menambahkan admin secara
                massal.</p>
        </div>

        <input type="file" name="file" required
            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm mb-6 focus:ring-2 focus:ring-blue-500 outline-none">

        <button type="submit"
            class="w-full px-4 py-3 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 hover:shadow-lg transition-all shadow-blue-500/20">
            Mulai Import Data
        </button>
    </form>
</x-modal>

@include('admin.users._modal')
@endsection