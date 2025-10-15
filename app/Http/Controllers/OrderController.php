<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /* ===========================================================
       👤 BAGIAN UNTUK USER (JANGAN DIUBAH)
    ============================================================ */
    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $order = Order::create([
            'customer_id' => Auth::id(),
            'status' => 'pending',
            'total_price' => 0,
        ]);

        $total = 0;

        foreach ($data['items'] as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_name' => $item['product_name'] ?? null, // biar aman kalo null
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $subtotal,
            ]);
        }

        $order->update(['total_price' => $total]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }

    public function index()
    {
        $orders = Order::latest()->get();
        return view('order.index', compact('orders'));
    }

    public function show()
    {
        $orders = Order::where('customer_id', Auth::id())->get();
        return view('order.show', compact('orders'));
    }



    /* ===========================================================
   🧑‍💼 BAGIAN UNTUK ADMIN (ORDER CRUD)
============================================================ */

public function orderCrudIndex()
{
    $orders = Order::with('customer')->latest()->get();
    return view('order_crud.index', compact('orders'));
}

// ➕ Form tambah order manual (admin)
public function orderCrudCreate()
{
    $customers = User::all(); // ambil semua user untuk dropdown customer
    $products = Product::all(); // ambil semua produk untuk dropdown produk
    return view('order_crud.create', compact('customers', 'products'));
}

// 💾 Simpan order baru
public function orderCrudStore(Request $request)
{
    $request->validate([
        'customer_id' => 'required|exists:users,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'status' => 'required|string',
    ]);

    $product = Product::find($request->product_id);
    $total_price = $product->price * $request->quantity;

    $order = Order::create([
        'customer_id' => $request->customer_id,
        'status' => $request->status,
        'total_price' => $total_price,
    ]);

    // Buat item order
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'product_name' => $product->name,
        'quantity' => $request->quantity,
        'price' => $product->price,
        'total' => $total_price,
    ]);

    return redirect()->route('orderCrud.index')->with('success', 'Order berhasil ditambahkan!');
}

// ✏️ Form edit order
public function orderCrudEdit($id)
{
    $order = Order::with('items')->findOrFail($id);
    $customers = User::all();
    $products = Product::all();
    
    return view('order_crud.edit', compact('order', 'customers', 'products'));
}

// 🔁 Update order
public function orderCrudUpdate(Request $request, $id)
{
    $request->validate([
        'customer_id' => 'required|exists:users,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'status' => 'required|string',
    ]);

    $order = Order::with('items')->findOrFail($id);
    $product = Product::find($request->product_id);
    $total_price = $product->price * $request->quantity;

    // update order utama
    $order->update([
        'customer_id' => $request->customer_id,
        'status' => $request->status,
        'total_price' => $total_price,
    ]);

    // update item order pertama (kalau ada)
    if ($order->items->isNotEmpty()) {
        $order->items->first()->update([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'total' => $total_price,
        ]);
    }

    return redirect()->route('orderCrud.index')->with('success', 'Order berhasil diperbarui!');
}

// ❌ Hapus order
public function orderCrudDestroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orderCrud.index')->with('success', 'Order berhasil dihapus!');
}

}
