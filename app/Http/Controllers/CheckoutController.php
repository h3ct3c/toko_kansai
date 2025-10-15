<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function index()
    {
        // Ambil isi cart dari session
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }

        // Ambil produk dari database
        $productIds = array_keys(array: $cart);
        $products = Product::whereIn('id', $productIds)->get();

        // Hitung subtotal
        $subtotal = 0;
        foreach ($products as $product) {
            $subtotal += $product->price * $cart[$product->id]['quantity'];
        }

        // Data pengiriman (default kosong)
        $shipping = session()->get('shipping', [
            'name' => '',
            'address' => '',
            'city' => '',
            'postal_code' => '',
            'shipping_cost' => 0,
        ]);

        $total = $subtotal + $shipping['shipping_cost'];

        return view('checkout.index', compact('products', 'cart', 'subtotal', 'shipping', 'total'));
    }

    /**
     * Menyimpan pesanan ke database.
     */
    public function store(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
    }

    // Hitung total harga
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Buat order baru
    $order = Order::create([
        'customer_id' => Auth::id(), // ✅ INI YANG PENTING
        'product_name' => implode(', ', array_map(fn($item) => $item['name'], $cart)), // Gabungkan nama produk
        'quantity' => array_sum(array_map(fn($item) => $item['quantity'], $cart)), // Total quantity
        'total' => $total,
        'total_price' => $total,
        'status' => 'Diproses',
    ]);

    // Simpan detail produk ke tabel order_items
    foreach ($cart as $id => $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    // Kosongkan keranjang
    session()->forget('cart');

    return redirect()->route('order.show')->with('success', 'Pesanan berhasil dibuat!');
}
}
