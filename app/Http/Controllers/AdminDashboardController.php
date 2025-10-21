<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total dasar
        $totalRevenue = Order::sum('total_price');
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();

        // Revenue minggu ini & minggu lalu
        $thisWeekRevenue = Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('total_price');
        $lastWeekRevenue = Order::whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->sum('total_price');

        $revenueChange = $lastWeekRevenue > 0 ? round((($thisWeekRevenue - $lastWeekRevenue) / $lastWeekRevenue) * 100, 1) : 0;

        // User bulan ini vs bulan lalu
        $thisMonthUsers = User::whereMonth('created_at', now()->month)->count();
        $lastMonthUsers = User::whereMonth('created_at', now()->subMonth()->month)->count();
        $userChange = $lastMonthUsers > 0 ? round((($thisMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1) : 0;

        // Order hari ini vs kemarin
        $todayOrders = Order::whereDate('created_at', today())->count();
        $yesterdayOrders = Order::whereDate('created_at', today()->subDay())->count();
        $orderChange = $yesterdayOrders > 0 ? round((($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100, 1) : 0;

        // Produk baru hari ini vs kemarin
        $todayProducts = Product::whereDate('created_at', today())->count();
        $yesterdayProducts = Product::whereDate('created_at', today()->subDay())->count();
        $productChange = $yesterdayProducts > 0 ? round((($todayProducts - $yesterdayProducts) / $yesterdayProducts) * 100, 1) : 0;

        // Data grafik bulanan
        $salesData = Order::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total')
        )->groupBy('month')->orderBy('month')->pluck('total', 'month');

        // Produk terlaris
        $topProducts = Product::select('name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        return view('layouts.dashboard', compact(
            'totalRevenue',
            'totalUsers',
            'totalOrders',
            'totalProducts',
            'revenueChange',
            'userChange',
            'orderChange',
            'productChange',
            'salesData',
            'topProducts'
        ));
    }
}
