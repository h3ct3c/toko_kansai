@extends('layouts.admin')

<script src="https://cdn.tailwindcss.com"></script>

@section('page_title', 'edit product')

@section('content')
<div class="p-6 bg-white shadow-2xl rounded-xl max-w-4xl mx-auto mt-8">
    <h2 class="text-3xl font-bold text-blue-900 mb-8 border-b-4 border-blue-100 pb-3">
        Edit Produk: {{ $product->name }}
    </h2>

    <form action="{{ route('product_crud.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="space-y-2">
                <label for="name" class="block text-sm font-semibold text-gray-700">Nama Produk</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $product->name) }}"
                       placeholder="Masukkan nama produk"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-blue-900 focus:border-blue-900 transition duration-150">
            </div>

            <div class="space-y-2">
                <label for="price" class="block text-sm font-semibold text-gray-700">Harga (Rp)</label>
                <input type="number" name="price" id="price"
                       value="{{ old('price', $product->price) }}"
                       placeholder="Cth: 150000"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-900 transition duration-150">
            </div>

            <div class="space-y-2">
                <label for="category_id" class="block text-sm font-semibold text-gray-700">Kategori</label>
                <select name="category_id" id="category_id"
                        class="mt-1 block w-full pl-4 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-700 focus:border-blue-800 rounded-xl shadow-sm appearance-none transition duration-150 bg-white">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}"
                                {{ old('category_id', $product->category_id) == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label for="color_id" class="block text-sm font-semibold text-gray-700">Warna</label>
                <select name="color_id" id="color_id"
                        class="mt-1 block w-full pl-4 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-900 focus:border-blue-700 rounded-xl shadow-sm appearance-none transition duration-150 bg-white">
                    <option value="">-- Pilih Warna --</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}"
                                {{ old('color_id', $product->color_id) == $color->id ? 'selected' : '' }}>
                            {{ $color->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label for="stock" class="block text-sm font-semibold text-gray-700">Stok</label>
                <input type="number" name="stock" id="stock"
                       value="{{ old('stock', $product->stock) }}"
                       placeholder="Jumlah stok saat ini"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
            </div>
            
             <div class="space-y-2">
                <label class="block text-sm font-semibold text-gray-700">Gambar Saat Ini</label>
                @if($product->image)
                    <p class="text-sm text-gray-500 truncate">{{ basename($product->image) }}</p>
                    <img src="{{ asset('img/' . $product->image) }}" alt="Gambar Produk" class="h-20 w-20 object-cover rounded-lg border border-gray-200 shadow-md">
                    <small class="text-gray-400">Tinggalkan kosong jika tidak ingin diubah.</small>
                @else
                    <p class="text-sm text-gray-500">Belum ada gambar.</p>
                @endif
            </div>
            
            <div class="space-y-2 md:col-span-2"> <label for="image" class="block text-sm font-semibold text-gray-700">Unggah Gambar Baru</label>
                <input type="file" name="image" id="image"
                       class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition duration-150 cursor-pointer">
            </div>
        </div>

        <div class="space-y-2 pt-4">
            <label for="description" class="block text-sm font-semibold text-gray-700">Deskripsi Produk</label>
            <textarea name="description" id="description" rows="5"
                      placeholder="Jelaskan detail produk Anda di sini..."
                      class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-blue-900 focus:border-blue-900 transition duration-150">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="pt-6 border-t border-gray-100 mt-6">
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-4 border border-transparent shadow-lg text-lg font-semibold rounded-xl text-white bg-blue-900 hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:scale-[1.01]">
                 Perbarui Data Produk
            </button>
        </div>
    </form>
</div>
@endsection