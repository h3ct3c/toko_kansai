@extends('layouts.admin')

@section('page_title', 'products')

@section('content')

{{-- Header Utama (judul + tombol tambah di luar card tabel) --}}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-900">
        Manajemen Produk
    </h1>
    <a href="{{ route('product_crud.create') }}"
       class="mt-4 sm:mt-0 bg-gradient-to-br from-blue-900 to-blue-800 hover:bg-blue-800 text-white font-medium px-6 py-2 rounded-lg shadow-md transform hover:scale-[1.02] transition duration-300">
        <span class="mr-1">+</span> Tambah Produk Baru
    </a>
</div>

{{-- Notifikasi (Alert) --}}
@if (session('success'))
    @php
        $isDeleted = str_contains(session('success'), 'Dihapus');
        $alertColor = $isDeleted 
            ? 'bg-red-50 border-red-400 text-red-700' 
            : 'bg-green-50 border-green-400 text-green-700';
    @endphp

    <div id="alert-message" 
        class="{{ $alertColor }} border-l-4 p-4 rounded-lg mb-6 shadow-sm transition duration-500">
        <p class="font-medium">{{ session('success') }}</p>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
@endif

{{-- Card Kontainer Tabel --}}
<div class="bg-white shadow-xl rounded-xl border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 w-4">
                        <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500 border-gray-300">
                    </th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-3/12">Product Name</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-2/12">Category</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-2/12">Color</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-1/12">Stock</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right w-1/12">Price</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right w-3/12">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500 border-gray-300">
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex flex-col">
                                <span class="font-medium text-gray-900">{{ $product->name }}</span>
                                <span class="text-xs text-gray-500">ID: #{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $product->category_id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $product->color_id }}</td>
                        <td class="px-6 py-3 text-sm">
                            <span class="font-medium px-2 py-0.5 rounded
                                @if($product->stock > 10) text-blue-700 bg-blue-100
                                @elseif($product->stock > 0) text-yellow-700 bg-yellow-100
                                @else text-red-700 bg-red-100 @endif">
                                {{ $product->stock }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-sm font-semibold text-gray-900 text-right">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-3 text-right">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('product_crud.edit', $product) }}"
                                   class="inline-flex items-center h-8 px-3 py-2 text-xs font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 shadow-sm transform hover:scale-[1.02] transition duration-300">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    Edit item
                                </a>
                                <form action="{{ route('product_crud.destroy', $product) }}" method="POST" onsubmit="return confirm('❗ Yakin hapus produk {{ $product->name }}? Aksi ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 shadow-sm transform hover:scale-[1.02] transition duration-300">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Delete item
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-lg text-gray-500 bg-gray-50/50">
                            😔 Belum ada produk yang tercatat. Silakan tambah produk baru!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginasi --}}
    @if(isset($products) && method_exists($products, 'links'))
        <div class="mt-4 p-4 border-t border-gray-100">
            {{ $products->links() }}
        </div>
    @endif
</div>

@endsection
