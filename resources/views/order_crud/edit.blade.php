@extends('layouts.admin') {{-- Menggunakan layout header sesuai permintaan Anda --}}

@section('content')

{{-- Container Utama --}}
<div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8 ms-[260px]">
    
    {{-- Card Form Premium: Shadow yang lebih menonjol, border-t untuk aksen --}}
    <div class="bg-white shadow-2xl rounded-xl p-6 lg:p-10 max-w-4xl mx-auto border-t-4 border-blue-900 ring-1 ring-gray-100">
        
        {{-- Header Form dengan Desain Tegas --}}
        <div class="flex items-center mb-8 pb-4">
            {{-- Menggunakan SVG icon pensil untuk edit --}}
            <svg class="w-9 h-9 mr-3 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-7-4l9-9m-7 7l-2 2"></path></svg>
            <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Edit Order #{{ $order->id }}</h2>
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

        <form action="{{ route('orderCrud.update', $order->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Row 1: Customer dan Produk (2 Kolom) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Input: Nama Customer --}}
                <div>
                    <label for="customer_id" class="block text-gray-700 font-semibold mb-2">Nama Customer <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select id="customer_id" name="customer_id" 
                                class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 
                                        transition duration-150 appearance-none bg-white text-gray-800 shadow-sm">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ ($order->customer_id == $customer->id || old('customer_id') == $customer->id) ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- Input: Produk --}}
                <div>
                    <label for="product_id" class="block text-gray-700 font-semibold mb-2">Pilih Produk <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <select id="product_id" name="product_id" 
                                class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 
                                        transition duration-150 appearance-none bg-white text-gray-800 shadow-sm">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ ($order->items->first()->product_id == $product->id || old('product_id') == $product->id) ? 'selected' : '' }}>
                                    {{ $product->name }} (Rp{{ number_format($product->price, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 11v10"></path></svg>
                        </div>
                    </div>
                </div>
            </div> {{-- End Row 1 --}}

            {{-- Row 2: Jumlah dan Status (2 Kolom) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Input: Jumlah --}}
                <div>
                    <label for="quantity" class="block text-gray-700 font-semibold mb-2">Jumlah Unit <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="number" id="quantity" name="quantity" min="1" 
                               value="{{ old('quantity', $order->items->first()->quantity ?? 1) }}"
                               placeholder="Min. 1 unit"
                               class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 
                                      transition duration-150 text-gray-800 shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m-4-8h8"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- Input: Status Order --}}
                <div>
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status Order</label>
                    <div class="relative">
                        <select id="status" name="status" 
                                class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 
                                        transition duration-150 appearance-none bg-white text-gray-800 shadow-sm">
                            {{-- Mengambil status order yang ada dari database --}}
                            @php $orderStatus = old('status', $order->status); @endphp
                            <option value="processing" {{ $orderStatus == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $orderStatus == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $orderStatus == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $orderStatus == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.618a.999.999 0 011.414 0l.01.01a.999.999 0 010 1.414l-9 9a.999.999 0 01-1.414 0l-4-4a.999.999 0 010-1.414l.01-.01a.999.999 0 011.414 0L9 14.586l3.293-3.293a.999.999 0 011.414 0z"></path></svg>
                        </div>
                    </div>
                </div>
            </div> {{-- End Row 2 --}}


            {{-- Tombol Aksi --}}
            <div class="flex justify-end pt-6 gap-4 border-t border-gray-100 mt-8">
                <a href="{{ route('orderCrud.index') }}" 
                   class="px-8 py-3 bg-gray-200 hover:bg-gray-300 rounded-xl text-gray-700 font-normal 
                          transition duration-150 shadow-md">
                    <span class="mr-1">Kembali</span>
                </a>
                {{-- Tombol Update dengan SVG icon --}}
                <button type="submit" 
                        class="px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white rounded-xl font-normal 
                               shadow-xl transform hover:scale-[1.01] transition duration-300">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Update Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
