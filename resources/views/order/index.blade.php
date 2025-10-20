@include('layout.header')

<div class="container mx-auto mt-10 px-6">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            Detail Order #{{ $order->id }}
        </h2>

        {{-- INFO UMUM ORDER --}}
        <div class="text-gray-700 space-y-2 mb-6">
            <p>Status: 
                <span class="font-medium text-gray-900">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p>Total Item: 
                <span class="font-medium text-gray-900">
                    {{ $order->total_items }}
                </span>
            </p>
            <p>Total Harga: 
                <span class="font-bold text-green-600">
                    Rp{{ number_format($order->total_price, 0, ',', '.') }}
                </span>
            </p>
        </div>

        {{-- INFO ALAMAT DAN KONTAK --}}
        <div class="bg-gray-50 rounded-xl p-4 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Alamat Pengiriman</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700">
                <p><span class="font-medium">Nama Penerima:</span> {{ $order->user->name ?? '-' }}</p>
                <p><span class="font-medium">Nomor Telepon:</span> {{ $order->phone ?? '-' }}</p>
                <p><span class="font-medium">Jalan:</span> {{ $order->address ?? '-' }}</p>
                <p><span class="font-medium">Kelurahan:</span> {{ $order->kelurahan ?? '-' }}</p>
                <p><span class="font-medium">Kecamatan:</span> {{ $order->kecamatan ?? '-' }}</p>
                <p><span class="font-medium">Kota:</span> {{ $order->kota ?? '-' }}</p>
                <p><span class="font-medium">Provinsi:</span> {{ $order->provinsi ?? '-' }}</p>
                <p><span class="font-medium">Kode Pos:</span> {{ $order->kode_pos ?? '-' }}</p>
            </div>
        </div>

        {{-- DAFTAR PRODUK --}}
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-700">
                        <th class="py-3 px-4 border-b font-semibold">Produk</th>
                        <th class="py-3 px-4 border-b font-semibold text-center">Jumlah</th>
                        <th class="py-3 px-4 border-b font-semibold text-right">Harga</th>
                        <th class="py-3 px-4 border-b font-semibold text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4 border-b">
                                <div class="flex items-center gap-3">
                                    @if($item->product->image ?? false)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                             alt="{{ $item->product->name }}" 
                                             class="w-12 h-12 object-cover rounded-md">
                                    @endif
                                    <span class="font-medium text-gray-800">{{ $item->product->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4 border-b text-center">{{ $item->quantity }}</td>
                            <td class="py-3 px-4 border-b text-right text-gray-700">
                                Rp{{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="py-3 px-4 border-b text-right font-semibold text-gray-900">
                                Rp{{ number_format($item->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- TOMBOL KEMBALI --}}
        <div class="text-right mt-6">
            <a href="{{ route('order.show') }}" 
               class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                Kembali ke Daftar Order
            </a>
        </div>
    </div>
</div>
