<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }

        // Ambil produk dari database
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        // Hitung subtotal
        $subtotal = 0;
        foreach ($cart as $productId => $item) {
            if (!isset($products[$productId])) continue;
            $price = $products[$productId]->price;
            $quantity = $item['quantity'] ?? 1;
            $subtotal += $price * $quantity;
        }

        // Ambil data pengiriman dari session (kalau ada)
        $shipping = session()->get('shipping', [
            'method' => 'Gratis',
            'cost' => 0
        ]);

        $total = $subtotal + ($shipping['cost'] ?? 0);

        return view('checkout.index', compact('products', 'cart', 'subtotal', 'shipping', 'total'));
    }

    /**
     * Proses simpan pesanan ke database
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }

        // Validasi input alamat & telepon
        $request->validate([
            'jalan' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
            'nomor_telepon' => 'required|string|max:15',
        ]);

        DB::beginTransaction();
        try {
            $productIds = array_keys($cart);
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            $totalPrice = 0;
            foreach ($cart as $productId => $item) {
                if (!isset($products[$productId])) continue;
                $totalPrice += $products[$productId]->price * ($item['quantity'] ?? 1);
            }

            // Simpan ke tabel orders
            $order = Order::create([
                'customer_id' => Auth::id(),
                'product_name' => implode(', ', array_column($cart, 'name')),
                'quantity' => array_sum(array_column($cart, 'quantity')),
                'total_price' => $totalPrice,
                'status' => 'Diproses', // default status

                // Tambahan kolom alamat dan kontak
                'jalan' => $request->jalan,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'kode_pos' => $request->kode_pos,
                'nomor_telepon' => $request->nomor_telepon,
            ]);

            // Simpan ke tabel order_items
            foreach ($cart as $productId => $item) {
                if (!isset($products[$productId])) continue;
                $product = $products[$productId];
                $quantity = $item['quantity'] ?? 1;
                $price = $product->price;
                $total = $price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'product_name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $total,
                ]);
            }

            DB::commit();

            // Hapus cart dari session
            session()->forget('cart');

            return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout.index')->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }
}
