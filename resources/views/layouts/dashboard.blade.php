@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
<div class="bg-gray-50 p-6 rounded-2xl space-y-10">

    {{-- GRID CARD STATISTICS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Total Revenue --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h2>
                </div>
                <div class="bg-gradient-to-tr from-green-500 to-teal-400 p-3 rounded-xl text-white shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <p class="mt-3 text-sm font-semibold {{ $revenueChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $revenueChange >= 0 ? '+' : '' }}{{ $revenueChange }}% than last week
            </p>
        </div>

        {{-- Total Users --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Users</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalUsers }}</h2>
                </div>
                <div class="bg-gradient-to-tr from-blue-500 to-indigo-400 p-3 rounded-xl text-white shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <p class="mt-3 text-sm font-semibold {{ $userChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $userChange >= 0 ? '+' : '' }}{{ $userChange }}% than last month
            </p>
        </div>

        {{-- Total Orders --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Orders</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalOrders }}</h2>
                </div>
                <div class="bg-gradient-to-tr from-yellow-500 to-orange-400 p-3 rounded-xl text-white shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
            </div>
            <p class="mt-3 text-sm font-semibold {{ $orderChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $orderChange >= 0 ? '+' : '' }}{{ $orderChange }}% than yesterday
            </p>
        </div>

        {{-- Total Products --}}
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Products</p>
                    <h2 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalProducts }}</h2>
                </div>
                <div class="bg-gradient-to-tr from-red-500 to-pink-400 p-3 rounded-xl text-white shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
            </div>
            <p class="mt-3 text-sm font-semibold {{ $productChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $productChange >= 0 ? '+' : '' }}{{ $productChange }}% than yesterday
            </p>
        </div>
    </div>

    {{-- GRID: SALES CHART + TOP PRODUCTS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Grafik Penjualan --}}
        <div class="col-span-2 bg-white p-6 rounded-xl shadow-md">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Daily Sales</h2>
                <span class="text-sm text-gray-500">15% increase in today sales</span>
            </div>

            {{-- chart container dengan tinggi fix --}}
            <div class="relative h-64">
                <canvas id="salesChart"></canvas>
            </div>

            <p class="text-gray-400 text-xs mt-4">updated 4 min ago</p>
        </div>

        {{-- Produk Terlaris --}}
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Top Selling Products</h2>
            <ul class="divide-y divide-gray-100">
                @forelse ($topProducts as $product)
                    <li class="py-3 flex justify-between items-center hover:bg-gray-50 px-2 rounded-lg transition">
                        <span class="text-[15px] text-gray-700">{{ $product->name }}</span>
                        <span class="text-blue-900 text-sm font-semibold">{{ $product->total_sold }} sold</span>
                    </li>
                @empty
                    <li class="py-3 text-gray-400 text-center text-sm">Belum ada data penjualan.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

{{-- CHART.JS --}}
<canvas id="salesChart" class="h-[300px] w-full"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('salesChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_map(fn($m) => date("M", mktime(0,0,0,$m,1)), array_keys($salesData->toArray()))) !!},
        datasets: [{
            label: 'Pendapatan Bulanan',
            data: {!! json_encode(array_values($salesData->toArray())) !!},
            borderColor: 'rgba(37, 99, 235, 1)',
            backgroundColor: 'rgba(37, 99, 235, 0.2)',
            tension: 0.4,
            fill: true,
            pointBackgroundColor: 'rgba(37, 99, 235, 1)',
            pointRadius: 5,
            pointHoverRadius: 7,
            borderWidth: 3,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: 'rgba(200,200,200,0.2)' }
            },
            x: {
                grid: { display: false }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
</script>
@endsection
