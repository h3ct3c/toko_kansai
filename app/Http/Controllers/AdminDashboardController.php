<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total revenue (dari tabel order_items)
        $totalRevenue = OrderItem::select(DB::raw('SUM(price * quantity) as total'))->value('total') ?? 0;

        // Total user
        $totalUsers = User::count();

        // Total order
        $totalOrders = Order::count();

        // Total produk
        $totalProducts = Product::count();

        // Produk paling laku
        $topProducts = Product::select('products.id', 'products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        // Analisis penjualan per bulan (untuk chart)
        $salesData = OrderItem::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(price * quantity) as total')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        return view('layouts.dashboard', compact(
            'totalRevenue',
            'totalUsers',
            'totalOrders',
            'totalProducts',
            'topProducts',
            'salesData'
        ));
    }
}
