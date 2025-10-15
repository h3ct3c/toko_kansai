@extends('layouts.admin')

{{-- Menghapus tag <html>, <head>, dan <body> karena sudah ada di layout utama --}}
@section('content')

{{-- Kontainer utama, atur lebar dan jarak atas --}}
<div class="w-[1210px] mt-8 px-10 sm:px-10 lg:px-12 ms-[270px]">
    
    {{-- Bagian Header: Judul dan Tombol Tambah --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-900 flex items-center">
            {{-- SVG Ikon untuk Produk --}}
            Daftar Produk
        </h2>
        {{-- Tombol Tambah dengan style modern blue-900 --}}
        <a href="{{ route('product_crud.create') }}"
        class="mt-4 sm:mt-0 bg-blue-900 hover:bg-blue-800 text-white font-medium px-6 py-2 rounded-lg shadow-md transform hover:scale-[1.02] transition duration-300 ease-in-out">
            <span class="mr-1">+</span> Tambah Produk Baru
        </a>
    </div>

    {{-- Notifikasi (Alert) (Dikeluarkan dari Card) --}}
    @if (session('success'))
        @php
            // Menentukan warna notifikasi sesuai tema
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
            // Skrip untuk menghilangkan notifikasi
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
    
    {{-- Card Kontainer Khusus Tabel --}}
    {{-- Efek mengambang (shadow) dan sudut melengkung hanya pada tabel --}}
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">  
                {{-- Header Tabel (Mengikuti style minimalis) --}}
                <thead class="border-b border-gray-100 bg-gray-100">
                    <tr>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Product Name</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Color</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Price</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="p-4 text-sm text-gray-600">{{ $loop->iteration }}</td>
                        
                        {{-- Nama Produk (dibuat lebih menonjol) --}}
                        <td class="p-4 font-medium text-gray-800">
                            {{ $product->name}}
                        </td>
                        
                        {{-- Kolom Category --}}
                        <td class="p-4 text-sm text-gray-700">
                            {{-- Ganti dengan product->category->name jika relasi tersedia --}}
                            {{ $product->category_id }} 
                        </td>
                        
                        {{-- Kolom Color --}}
                        <td class="p-4 text-sm text-gray-700">
                            {{-- Ganti dengan product->color->name jika relasi tersedia --}}
                            {{ $product->color_id }}
                        </td>
                        
                        {{-- Kolom Stock (Badge/Highlight jika stok rendah) --}}
                        <td class="p-4 text-sm">
                            <span class="font-medium px-2 py-0.5 rounded
                                @if($product->stock > 10) text-green-700 bg-green-100
                                @elseif($product->stock > 0) text-yellow-700 bg-yellow-100
                                @else text-red-700 bg-red-100 @endif">
                                {{ $product->stock }}
                            </span>
                        </td>
                        
                        {{-- Kolom Price (Dibuat Bold dan Rata Kanan) --}}
                        <td class="p-4 text-sm font-semibold text-gray-900 text-right">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        
                        {{-- Kolom Actions (Menggunakan SVG Icons) --}}
                        <td class="p-4 text-center">
                            <div class="flex justify-center space-x-1">
                                
                                {{-- Tombol View (Eye SVG) --}}
                                <a href="{{ route('product_crud.show', $product) }}"
                                class="text-gray-600 hover:text-gray-800 p-2 rounded-full hover:bg-gray-50 transition" title="Lihat Detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>

                                {{-- Tombol Edit (Pencil SVG) --}}
                                <a href="{{ route('product_crud.edit', $product) }}"
                                class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50 transition" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-9-4l9-9m-7 7l-2 2"></path></svg>
                                </a>

                                {{-- Tombol Hapus (Trash SVG) --}}
                                <form action="{{ route('product_crud.destroy', $product) }}" method="POST" onsubmit="return confirm('❗ Yakin hapus produk {{ $product->name }}? Aksi ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded-full hover:bg-red-50 transition" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="p-8 text-center text-lg text-gray-500 bg-gray-50/50" colspan="7">
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
</div>

@endsection