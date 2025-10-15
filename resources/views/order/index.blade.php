@include('layout.header')

<div class="container mx-auto mt-10 px-6">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Order #{{ $orders->id }}
        </h2>
        <div class="text-gray-600 space-y-1 mb-6">
            <p>Status: <span class="font-medium text-gray-800">{{ ucfirst($order->status) }}</span></p>
            <p>Total Item: <span class="font-medium text-gray-800">{{ $order->total_items }}</span></p>
            <p>Total Harga: 
                <span class="font-bold text-green-600">
                    Rp{{ number_format($order->total_price, 0, ',', '.') }}
                </span>
            </p>
        </div>

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

        <div class="text-right mt-6">
            <a href="{{ route('orders.index') }}" 
               class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                Kembali ke Daftar Order
            </a>
        </div>
    </div>
</div>
