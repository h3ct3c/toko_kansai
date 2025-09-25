@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

    {{-- Notifikasi sukses --}}
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ $message }}
        </div>
    @endif

    {{-- Tombol tambah produk --}}
    <div class="mb-4">
        <a href="{{ route('product_crud.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Produk
        </a>
    </div>

    {{-- Tabel produk --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Warna</th>
                    <th class="px-4 py-2 border">Harga</th>
                    <th class="px-4 py-2 border">Stok</th>
                    <th class="px-4 py-2 border">Gambar</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $i => $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $i + $products->firstItem() }}</td>
                        <td class="px-4 py-2 border">{{ $product->name }}</td>
                        <td class="px-4 py-2 border">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $product->color->name ?? '-' }}</td>
                        <td class="px-4 py-2 border">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border">{{ $product->stock }}</td>
                        <td class="px-4 py-2 border">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="{{ route('product_crud.edit', $product->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('product_crud.destroy', $product->id) }}" 
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
