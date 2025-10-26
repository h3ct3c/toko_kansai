<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
    }

    $cart = array_filter($cart, function ($item) {
        return isset($item['id']);
    });

    if (empty($cart)) {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('error', 'Keranjang tidak valid, silakan tambah produk lagi.');
    }

    $productIds = collect($cart)->pluck('id')->unique();
    $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

    $subtotal = collect($cart)->reduce(function ($total, $item) use ($products) {
        $id = $item['id'] ?? null;
        if (!$id || !isset($products[$id])) return $total;

        $quantity = $item['quantity'] ?? 1;
        $price = $products[$id]->price ?? 0;

        return $total + ($price * $quantity);
    }, 0);

    $shipping = session()->get('shipping', [
        'method' => 'pickup',
        'cost' => 0,
    ]);

    $total = $subtotal + ($shipping['cost'] ?? 0);

    return view('checkout.index', compact('products', 'cart', 'subtotal', 'shipping', 'total'));
}
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan checkout.');
        }

        $request->validate([
            'jalan' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
            'nomor_telepon' => 'required|string|max:15',
        ]);

        $shipping = session()->get('shipping', [
            'method' => 'pickup',
            'cost' => 0,
        ]);

        DB::beginTransaction();

        try {
            $productIds = collect($cart)->pluck('id')->unique();
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            $subtotal = 0;
            $combinedNames = [];
            $totalQuantity = 0;

            foreach ($cart as $item) {
                if (!isset($products[$item['id']])) continue;

                $product = $products[$item['id']];
                $quantity = $item['quantity'] ?? 1;
                $subtotal += $product->price * $quantity;
                $totalQuantity += $quantity;

                $color = $item['color'] ?? null;
                $combinedNames[] = $color
                    ? "{$product->name} (" . ucfirst($color) . ")"
                    : $product->name;
            }

            $totalPrice = $subtotal + ($shipping['cost'] ?? 0);

            $order = Order::create([
                'customer_id' => Auth::id(),
                'product_name' => implode(', ', $combinedNames),
                'quantity' => $totalQuantity,
                'subtotal' => $subtotal,
                'shipping_method' => ucfirst($shipping['method']),
                'shipping_cost' => $shipping['cost'],
                'total_price' => $totalPrice,
                'status' => 'Diproses',
                'jalan' => $request->jalan,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'kode_pos' => $request->kode_pos,
                'nomor_telepon' => $request->nomor_telepon,
            ]);

            foreach ($cart as $item) {
                if (!isset($products[$item['id']])) continue;

                $product = $products[$item['id']];
                $quantity = $item['quantity'] ?? 1;
                $price = $product->price;
                $total = $price * $quantity;

                $displayName = isset($item['color'])
                    ? $product->name . ' (' . ucfirst($item['color']) . ')'
                    : $product->name;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $displayName,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $total,
                ]);
            }

            DB::commit();

            session()->forget(['cart', 'shipping']);

            return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout.index')->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }
}
