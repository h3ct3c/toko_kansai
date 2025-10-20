@include('layout.header')
{{-- Pastikan header memuat Tailwind CSS dan Alpine.js --}}
{{-- Jika Anda belum memuat Alpine.js, Anda bisa tambahkan ini di <head> atau sebelum </body>: --}}
{{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

<body class="bg-gray-50">
    {{-- Inisialisasi Alpine.js dengan state 'openOrder' --}}
    <div class="container mx-auto px-4 py-8 max-w-7xl mt-6" x-data="{ openOrder: null }">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Riwayat Order</h1>
            <p class="text-gray-600 mt-2">Lihat daftar pesanan dan detail pembelian Anda.</p>
        </div>
        
        @if($orders->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 text-center">
                <p class="text-gray-500">Anda belum memiliki riwayat pesanan.</p>
            </div>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                    {{-- ID Order digunakan sebagai kunci untuk state Alpine.js --}}
                    @php
                        // Logika Status Badge
                        $statusClass = 'bg-gray-100 text-gray-800';
                        switch (strtolower($order->status)) {
                            case 'delivered':
                                $statusClass = 'bg-green-100 text-green-800';
                                break;
                            case 'processing':
                                $statusClass = 'bg-yellow-100 text-yellow-800';
                                break;
                            case 'shipped':
                                $statusClass = 'bg-blue-100 text-blue-800';
                                break;
                        }
                    @endphp

                    <div class="bg-white rounded-lg shadow-sm border border-gray-200"
                        x-data="{ orderId: {{ $order->id }} }">
                        
                        <div class="p-6 cursor-pointer hover:bg-gray-50 transition-colors"
                            @click="openOrder === orderId ? openOrder = null : openOrder = orderId">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                                <div class="mb-4 md:mb-0">
                                    <div class="flex items-center space-x-4">
                                        <span class="text-sm font-medium text-gray-900">Order #{{ $order->id }}</span>
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">
                                        Tanggal Order: {{ $order->created_at->format('d M, Y') ?? 'N/A' }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-semibold text-gray-900">
                                        Rp{{ number_format($order->total_price, 0, ',', '.') }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ $order->quantity ?? ($order->items->sum('quantity') ?? 'N/A') }} item
                                        {{-- Menggunakan $order->items->sum('quantity') jika $order->quantity tidak tersedia --}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100" x-show="openOrder === orderId"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            
                            <div class="p-6 space-y-6">
                                <div class="space-y-4">
                                    <h3 class="text-base font-semibold text-gray-900 border-b pb-2">Produk yang Dibeli</h3>
                                    
                                    {{-- Loop untuk menampilkan setiap item dalam order --}}
                                    @if($order->items->isNotEmpty())
                                        <div class="space-y-4">
                                            @foreach($order->items as $item)
                                                <div class="flex items-start space-x-4 border-b pb-4 last:border-b-0 last:pb-0">
                                                    {{-- Gambar Produk --}}
                                                    <img src="{{ asset('img/' . $item->product->image) }}" 
                                                        alt="{{ $item->product_name ?? 'Product Image' }}"
                                                        class="w-16 h-16 object-cover rounded-md border border-gray-200 flex-shrink-0">
                                                    
                                                    <div class="flex-1 min-w-0">
                                                        {{-- Nama Produk --}}
                                                        <p class="text-sm font-medium text-gray-900 truncate">
                                                            {{ $item->product->name ?? $item->product_name }}
                                                        </p>
                                                        {{-- Quantity dan Harga Satuan --}}
                                                        <p class="text-sm text-gray-500 mt-1">
                                                            Quantity: {{ $item->quantity }}
                                                        </p>
                                                    </div>
                                                    
                                                    {{-- Subtotal Item --}}
                                                    <p class="text-sm font-semibold text-gray-900 ml-auto">
                                                        Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500">Detail produk tidak tersedia.</p>
                                    @endif
                                </div>
                            </div>

                            <div class="border-t border-gray-100 px-6 py-4 bg-gray-50">
                                <div class="flex justify-end space-x-4">
                                    <a href="{{ route('order.index', $order->id) }}"
                                        class="px-4 py-2 bg-blue-900 rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                        Lihat Detail Lengkap
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            @endif
    </div>
</body>