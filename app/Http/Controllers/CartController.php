<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Menampilkan halaman cart
    public function index()
    {
        $cart = session()->get('cart', []);
        $shipping = session()->get('shipping', [
            'method' => 'pickup',
            'cost' => 0,
        ]);

        return view('cart.index', compact('cart', 'shipping'));
    }

    // Menambahkan produk ke cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $quantity = (int) $request->input('quantity', 1);
        $color = $request->input('color', 'Default');
        $cart = session()->get('cart', []);

        // key unik
        $cartKey = $product->id . '-' . strtolower($color);

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
                'color' => $color,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Update manual
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $cartKey = $request->cart_key;
        $action = $request->action;

        if (!isset($cart[$cartKey])) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan di cart.');
        }

        switch ($action) {
            case 'increase':
                $cart[$cartKey]['quantity']++;
                break;

            case 'decrease':
                if ($cart[$cartKey]['quantity'] > 1) {
                    $cart[$cartKey]['quantity']--;
                }
                break;

            default:
                return redirect()->back()->with('error', 'Aksi tidak valid.');
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    // Hapus produk
    public function remove($cartKey)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
        }

        return redirect()->route(route: 'cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    // Simpan shipping
    public function setShipping(Request $request)
    {
        $request->validate([
            'shipping_method' => 'required|string',
            'shipping_cost' => 'required|numeric',
        ]);

        $shipping = [
            'method' => $request->shipping_method,
            'cost' => $request->shipping_cost,
        ];

        session()->put('shipping', $shipping);

        return response()->json(['success' => true, 'message' => 'Metode pengiriman disimpan.']);
    }

    public function clearShipping()
    {
        session()->forget('shipping');
        return redirect()->route('cart.index')->with('success', 'Metode pengiriman dihapus.');
    }

    // =========================================================
    // AJAX: Hitung subtotal
    // =========================================================
    private function calcSubtotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // =========================================================
    // AJAX Increase Quantity
    // =========================================================
    public function ajaxIncrease(Request $request)
    {
        $cart = session()->get('cart', []);
        $cartKey = $request->id;

        if (!isset($cart[$cartKey])) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan']);
        }

        $cart[$cartKey]['quantity'] += 1;
        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'quantity' => $cart[$cartKey]['quantity'],
            'subtotal' => $this->calcSubtotal($cart)
        ]);
    }

    // =========================================================
    // AJAX Decrease Quantity
    // =========================================================
    public function ajaxDecrease(Request $request)
    {
        $cart = session()->get('cart', []);
        $cartKey = $request->id;

        if (!isset($cart[$cartKey])) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan']);
        }

        if ($cart[$cartKey]['quantity'] > 1) {
            $cart[$cartKey]['quantity'] -= 1;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'quantity' => $cart[$cartKey]['quantity'],
            'subtotal' => $this->calcSubtotal($cart)
        ]);
    }
}
