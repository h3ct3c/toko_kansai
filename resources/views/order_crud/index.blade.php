@extends('layouts.admin')

@section('page_title', 'orders')

@section('content')
{{-- Bagian Header (Dikeluarkan dari Card) --}}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
    <h2 class="text-3xl font-semibold text-gray-900 flex items-center">
            {{-- Menggunakan warna blue-900 untuk ikon --}} 
            Daftar Order Pelanggan
        </h2>
        <a href="{{ route('orderCrud.create') }}" 
        class="mt-4 sm:mt-0 bg-blue-900 hover:bg-blue-800 text-white font-medium px-6 py-2 rounded-lg shadow-md transform hover:scale-[1.02] transition duration-300">
        <span class="mr-1">+</span> Tambah Order
    </a>
</div>

{{-- Container utama, kini hanya menampung layout dan jarak --}}
<div class="bg-white shadow-xl rounded-xl overflow-hidden">
    {{-- Notifikasi (Alert) (Dikeluarkan dari Card) --}}
    @if (session('success'))
        @php
            $isDeleted = str_contains(session('success'), 'dihapus');
            $alertColor = $isDeleted 
                ? 'bg-red-50 border-red-400 text-red-700' 
                : 'bg-green-50 border-green-400 text-green-700';
        @endphp

        <div id="alert-message" 
            class="{{ $alertColor }} border-l-4 p-4 rounded-lg mb-6 shadow-sm transition duration-500">
            <p class="font-medium">{{ session('success') }}</p>
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-message');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s ease-out';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 2000);
        </script>
    @endif
    
    {{-- Card Kontainer Khusus Tabel --}}
    {{-- Ini yang sekarang diberi background putih, shadow, dan padding --}}
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                {{-- Header Tabel (Mengikuti style minimalis contoh) --}}
                <thead class="border-b border-gray-100 bg-gray-50/50">
                    <tr>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Items</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="p-4 text-sm text-gray-600">{{ $loop->iteration }}</td>
                            
                            {{-- Kolom Customer --}}
                            <td class="p-4">
                                <div class="font-medium text-gray-800">
                                    {{ $order->customer->name ?? 'Anonim' }}
                                </div>
                                <div class="text-xs text-gray-500 mt-0.5">
                                    {{ $order->customer->email ?? 'N/A' }} 
                                </div>
                            </td>
                            
                            {{-- Kolom Items --}}
                            <td class="p-4 text-sm text-gray-700 max-w-xs">
                                @php
                                    $itemsToShow = collect($order->items)->take(2);
                                    $remainingItems = count($order->items) - 2;
                                @endphp
                                @foreach($itemsToShow as $item)
                                    <span class="text-xs font-medium text-gray-600">{{ $item->product->name ?? 'Produk Dihapus' }} (x{{ $item->quantity }})</span><br>
                                @endforeach
                                @if($remainingItems > 0)
                                    <span class="text-xs text-gray-400">+{{ $remainingItems }} produk lainnya</span>
                                @endif
                            </td>
                            
                            {{-- Kolom Amount --}}
                            <td class="p-4 text-sm font-medium text-gray-900">
                                Rp{{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            
                            {{-- Kolom Status --}}
                            <td class="p-4">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                    $currentClass = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $currentClass }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            
                            {{-- Kolom Date --}}
                            <td class="p-4 text-sm text-gray-500">
                                {{ $order->created_at->format('d/m/Y') }}
                            </td>
                            
                            {{-- Kolom Actions --}}
                            <td class="p-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    {{-- Tombol Edit (Pencil SVG) --}}
                                    <a href="{{ route('orderCrud.edit', $order->id) }}"
                                    class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 25" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-9-4l9-9m-7 7l-2 2"></path></svg>
                                    </a>
                                    
                                    {{-- Tombol Hapus (Trash SVG) --}}
                                    <form action="{{ route('orderCrud.destroy', $order->id) }}" method="POST" onsubmit="return confirm('❗ Yakin hapus order ini? Aksi ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded-full hover:bg-red-50 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-lg text-gray-500 bg-gray-50/50">
                                😔 Belum ada order yang tercatat. Silakan tambah order baru!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Opsional: Paginasi (jika ada) --}}
        @if(isset($orders) && method_exists($orders, 'links'))
            <div class="mt-4 p-4 border-t border-gray-100">
                {{ $orders->links() }}
            </div>
        @endif

    </div>
</div>

@endsection