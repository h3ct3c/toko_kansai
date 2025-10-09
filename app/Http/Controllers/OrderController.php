<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data pesanan
        $data = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        // Buat order baru
        $order = Order::create([
            'customer_id' => Auth::id(),
            'status' => 'pending',
            'total_price' => 0, // nanti dihitung
        ]);

        $total = 0;

        foreach ($data['items'] as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $subtotal,
            ]);
        }

        $order->update(['total_price' => $total]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }
}
