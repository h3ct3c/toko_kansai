@include("layout.header")

<div class="py-12">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-2">
        <h1 class="text-4xl font-bold text-blue-900 mb-8 border-b pb-3">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-10">

            {{-- FORM CHECKOUT --}}
            <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-xl border border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Detail Pengiriman & Pembayaran</h2>

                <form id="billingForm" method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap*</label>
                            <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition" placeholder="Nama Anda" />
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Jalan*</label>
                            <input type="text" id="address" name="address" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition" placeholder="Nama jalan, nomor rumah/bangunan" />
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Kota/Kabupaten*</label>
                            <input type="text" id="city" name="city" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition" placeholder="Contoh: Jakarta Pusat" />
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon*</label>
                            <input type="text" id="phone" name="phone" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition" placeholder="08xx-xxxx-xxxx" />
                        </div>

                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email*</label>
                            <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition" placeholder="nama@contoh.com" />
                        </div>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="pt-4 border-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Metode Pembayaran</h3>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 border border-gray-300 p-4 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="radio" name="payment_method" value="COD" checked class="h-5 w-5 text-blue-600 accent-blue-600" /> 
                                <span class="text-gray-900 font-medium flex-grow">Cash on Delivery (COD)</span>
                            </label>
                            <label class="flex items-center gap-3 border border-gray-300 p-4 rounded-lg cursor-pointer opacity-60">
                                <input type="radio" name="payment_method" value="Transfer" class="h-5 w-5 text-blue-600 accent-blue-600" disabled/> 
                                <span class="text-gray-900 font-medium flex-grow">Bank Transfer (belum tersedia)</span>
                            </label>
                        </div>
                    </div>

                    {{-- Hidden shipping data --}}
                    <input type="hidden" name="shipping_method" value="{{ $shipping['method'] ?? '' }}">
                    <input type="hidden" name="shipping_cost" value="{{ $shipping['cost'] ?? 0 }}">

                    {{-- Tombol --}}
                    <div class="pt-6">
                        <button type="submit" id="payBtn" 
                            class="w-full bg-blue-900 text-white font-semibold p-4 rounded-lg shadow-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-700 focus:ring-opacity-50 transition">
                            Buat Pesanan
                        </button>
                    </div>
                </form>
            </div>

            {{-- RINGKASAN PESANAN --}}
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-6 md:p-8 rounded-lg shadow-xl border border-gray-200 sticky top-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-6 max-h-96 overflow-y-auto pr-2">
                        @foreach($products as $product)
                        <div class="flex items-center justify-between border-b pb-3 last:border-b-0">
                            <div class="flex items-start gap-4">
                                <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-md border" />
                                <div>
                                    <p class="font-medium text-gray-800 line-clamp-2">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $cart[$product->id]['quantity'] }}</p>
                                </div>  
                            </div>
                            <span class="text-base font-semibold text-red-600 whitespace-nowrap">
                                Rp{{ number_format($product->price * $cart[$product->id]['quantity'], 0, ',', '.') }}
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-200 pt-6 space-y-3">
                        <div class="flex justify-between text-gray-700">
                            <span>Subtotal:</span>
                            <span class="font-medium">
                                Rp{{ number_format($subtotal, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex justify-between text-gray-700">
                            <span>Pengiriman ({{ $shipping['method'] ?? 'Gratis' }}):</span>
                            <span class="font-medium text-green-600">
                                @if(($shipping['cost'] ?? 0) > 0)
                                    Rp{{ number_format($shipping['cost'], 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between font-bold text-xl border-t border-gray-300 pt-3 mt-3">
                            <span>Total:</span>
                            <span class="text-gray-900">
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-[600px]"></div>

@include("layout.footer")
