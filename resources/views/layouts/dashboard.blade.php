@extends('layouts.admin')

@section('page_title', 'dashboard')

@section('content')
<div class="bg-white shadow-xl rounded-xl overflow-hidden">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        {{-- Total Revenue --}}
        <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transition duration-300 hover:shadow-xl">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h2>
            </div>
            <div class="bg-gradient-to-tr from-green-500 to-teal-400 p-3 rounded-xl text-white shadow-xl shadow-green-300/50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
        </div>

        {{-- Total Users --}}
        <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transition duration-300 hover:shadow-xl">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Users</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalUsers }}</h2>
            </div>
            <div class="bg-gradient-to-tr from-blue-500 to-indigo-400 p-3 rounded-xl text-white shadow-xl shadow-blue-300/50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>

        {{-- Total Orders --}}
        <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transition duration-300 hover:shadow-xl">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Orders</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalOrders }}</h2>
            </div>
            <div class="bg-gradient-to-tr from-yellow-500 to-orange-400 p-3 rounded-xl text-white shadow-xl shadow-yellow-300/50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between transition duration-300 hover:shadow-xl">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Products</p>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalProducts }}</h2>
            </div>
            <div class="bg-gradient-to-tr from-red-500 to-pink-400 p-3 rounded-xl text-white shadow-xl shadow-red-300/50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Grafik Penjualan (Tampilan Lebih Modern) --}}
        <div class="col-span-2 bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Sales Overview</h2>
            <p class="text-sm text-gray-500 mb-4">Grafik Tren Pendapatan Bulanan</p>
            <canvas id="salesChart" height="130"></canvas>
        </div>

        {{-- Produk Terlaris --}}
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Top Selling Products</h2>
            <ul class="divide-y divide-gray-100">
                @forelse ($topProducts as $product)
                    <li class="py-3 flex justify-between items-center transition duration-200 hover:bg-gray-50 -mx-3 px-3 rounded-lg">
                        <span class="font-normal text-[16px] text-gray-700">{{ $product->name }}</span>
                        <span class="text-blue-900 text-sm font-semibold">{{ $product->total_sold }} sold</span>
                    </li>
                @empty
                    <li class="py-3 text-gray-400 text-center text-sm">Belum ada data penjualan.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const salesData = @json(array_values($salesData->toArray()));
    const salesLabels = @json(array_keys($salesData->toArray()));

    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: salesLabels.map(m => `Bulan ${m}`),
            datasets: [{
                label: 'Total Revenue',
                data: salesData,
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79,70,229,0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection