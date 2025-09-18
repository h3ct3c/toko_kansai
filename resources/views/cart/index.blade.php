@include("layout.header")


    
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">🛒 Keranjang Belanja</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left">Produk</th>
                        <th class="py-3 px-4 text-left">Harga</th>
                        <th class="py-3 px-4 text-left">Jumlah</th>
                        <th class="py-3 px-4 text-left">Total</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cartItems as $item)
                        @php
                            $subtotal = $item->product->price * $item->quantity;
                            $grandTotal += $subtotal;
                        @endphp
                        <tr class="border-t">
                            <td class="py-3 px-4">{{ $item->product->name }}</td>
                            <td class="py-3 px-4">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                        class="w-16 border rounded px-2 py-1 text-center">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        Update
                                    </button>
                                </form>
                            </td>
                            <td class="py-3 px-4">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Total --}}
        <div class="mt-6 text-right">
            <h3 class="text-xl font-bold">Total: Rp {{ number_format($grandTotal, 0, ',', '.') }}</h3>
            <button class="mt-3 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
                Checkout
            </button>
        </div>
    @else
        <p class="text-gray-600">Keranjang Anda kosong.</p>
    @endif
</div>
@endsection
