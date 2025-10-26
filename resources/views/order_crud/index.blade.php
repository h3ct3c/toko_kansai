@extends('layouts.admin')

@section('page_title', 'orders')

@section('content')
{{-- Bagian Header--}}
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
    <h2 class="text-3xl font-semibold text-gray-800 flex items-center">
            Daftar Order Pelanggan
        </h2>
        <a href="{{ route('orderCrud.create') }}" 
        class="mt-4 sm:mt-0 bg-gradient-to-br from-blue-900 to-blue-800 hover:bg-blue-800 text-white font-medium px-6 py-2 rounded-lg shadow-md transform hover:scale-[1.02] transition duration-300">
        <span class="mr-1">+</span> Tambah Order
    </a>
</div>

{{-- Container utama--}}
<div class="bg-white shadow-xl rounded-xl overflow-hidden">
    {{-- Notifikasi--}}
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
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            
        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                {{-- Header Tabel--}}
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
                                        'processing' => 'bg-yellow-100 text-yellow-800',
                                        'shipped' => 'bg-green-100 text-green-800',
                                        'delivered' => 'bg-blue-100 text blue-800',
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
                            <td class="p-4 text-center">
                                <div class="flex justify-end space-x-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('orderCrud.edit', $order->id) }}"
                                    class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50 transition">
                                    <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="edit"> <g> <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8" fill="none" stroke="#00308f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <polygon fill="none" points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8" stroke="#00308f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polygon> </g> </g> </g> </g></svg>
                                    </a>
                                    
                                    {{-- Tombol Hapus --}}
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
        
        {{-- Opsional: Paginasi --}}
        @if(isset($orders) && method_exists($orders, 'links'))
            <div class="mt-4 p-4 border-t border-gray-100">
                {{ $orders->links() }}
            </div>
        @endif

    </div>
</div>

@endsection