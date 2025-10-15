@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8 ms-[260px]">
    <div class="bg-white shadow-2xl rounded-xl p-6 lg:p-10 max-w-4xl mx-auto border-t-4 border-blue-900 ring-1 ring-gray-100">
        <div class="flex items-center mb-8 pb-4">
            <svg class="w-9 h-9 mr-3 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3z"></path>
            </svg>
            <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Tambah Produk Baru</h2>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-400 text-red-700 p-4 rounded-lg shadow-sm">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-semibold mb-2">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="description" id="description"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Produk</label>
                <input type="file" name="image" id="image"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end pt-6 gap-4 border-t border-gray-100 mt-8">
<form action="{{ route('product_crud.store') }}" method="POST" enctype="multipart/form-data">
                <button type="submit" class="px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white rounded-xl font-normal shadow-xl transform hover:scale-[1.01] transition duration-300">Simpan Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection
