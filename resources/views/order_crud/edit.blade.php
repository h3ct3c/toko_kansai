@extends('layouts.admin')

@section('page_title', 'Edit Order')

@section('content')
<div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-2xl rounded-2xl p-8 lg:p-10 max-w-5xl mx-auto border-t-4 border-blue-900 ring-1 ring-gray-100">

        {{-- Header --}}
        <div class="flex items-center mb-10 pb-4 border-b border-gray-200">
            <svg class="w-9 h-9 mr-3 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-7-4l9-9m-7 7l-2 2"></path>
            </svg>
            <h2 class="text-3xl font-bold text-blue-900 tracking-tight">Edit Order #{{ $order->id }}</h2>
        </div>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-400 text-red-700 p-4 rounded-lg shadow-sm">
                <p class="font-bold mb-2 text-sm">❗ Mohon perbaiki kesalahan berikut:</p>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orderCrud.update', $order->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            {{-- Row 1: Customer & Produk --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Dropdown Customer --}}
                <div>
                    <label for="customer_id" class="block text-gray-700 font-semibold mb-2">Nama Customer <span class="text-red-500">*</span></label>
                    <select id="customer_id" name="customer_id"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                        <option value="" disabled selected>Pilih Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ ($order->customer_id == $customer->id) ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Dropdown Produk --}}
                <div>
                    <label for="product_id" class="block text-gray-700 font-semibold mb-2">Pilih Produk <span class="text-red-500">*</span></label>
                    <select id="product_id" name="product_id"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                        <option value="" disabled selected>Pilih Produk</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ ($order->items->first()->product_id == $product->id) ? 'selected' : '' }}>
                                {{ $product->name }} (Rp{{ number_format($product->price, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Row 2: Jumlah dan Status --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="quantity" class="block text-gray-700 font-semibold mb-2">Jumlah Unit <span class="text-red-500">*</span></label>
                    <input type="number" id="quantity" name="quantity" min="1"
                        value="{{ old('quantity', $order->items->first()->quantity ?? 1) }}"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status Order</label>
                    <select id="status" name="status"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                        @php $orderStatus = old('status', $order->status); @endphp
                        <option value="processing" {{ $orderStatus == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $orderStatus == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $orderStatus == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $orderStatus == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>

            {{-- Row 3: Alamat Lengkap --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="jalan" class="block text-gray-700 font-semibold mb-2">Nama Jalan</label>
                    <input type="text" id="jalan" name="jalan"
                        value="{{ old('jalan', $order->jalan ?? '') }}"
                        placeholder="Nama jalan"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>

                <div>
                    <label for="nomor_telepon" class="block text-gray-700 font-semibold mb-2">Nomor Telepon</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $order->nomor_telepon ?? '') }}"
                        placeholder="0812xxxxxxx"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>
            </div>

            {{-- Row 4: Provinsi, Kota, Kecamatan, Kelurahan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <label for="provinsi" class="block text-gray-700 font-semibold mb-2">Provinsi</label>
                    <input type="text" id="provinsi" name="provinsi"
                        value="{{ old('provinsi', $order->provinsi ?? '') }}"
                        placeholder="Contoh: Jawa Barat"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>

                <div>
                    <label for="kota" class="block text-gray-700 font-semibold mb-2">Kota</label>
                    <input type="text" id="kota" name="kota"
                        value="{{ old('kota', $order->kota ?? '') }}"
                        placeholder="Contoh: Bandung"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>

                <div>
                    <label for="kecamatan" class="block text-gray-700 font-semibold mb-2">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan"
                        value="{{ old('kecamatan', $order->kecamatan ?? '') }}"
                        placeholder="Contoh: Cicendo"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>

                <div>
                    <label for="kelurahan" class="block text-gray-700 font-semibold mb-2">Kelurahan</label>
                    <input type="text" id="kelurahan" name="kelurahan"
                        value="{{ old('kelurahan', $order->kelurahan ?? '') }}"
                        placeholder="Contoh: Pasirkaliki"
                        class="w-full border border-gray-300 rounded-xl pl-4 pr-4 py-3 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition text-gray-800">
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end pt-6 gap-4 border-t border-gray-100 mt-8">
                <a href="{{ route('orderCrud.index') }}"
                   class="px-8 py-3 bg-gray-200 hover:bg-gray-300 rounded-xl text-gray-700 font-medium transition shadow-md">
                    Kembali
                </a>
                <button type="submit"
                    class="px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white rounded-xl font-medium shadow-xl transform hover:scale-[1.02] transition duration-300">
                    Update Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
