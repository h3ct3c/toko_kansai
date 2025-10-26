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

        // Buat key unik biar varian warna gak bentrok
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

    // Update jumlah produk di cart
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $cartKey = $request->cart_key;

        if (isset($cart[$cartKey])) {
            if ($request->action === 'increase') {
                $cart[$cartKey]['quantity']++;
            } elseif ($request->action === 'decrease' && $cart[$cartKey]['quantity'] > 1) {
                $cart[$cartKey]['quantity']--;
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // Menghapus produk dari cart
    public function remove($cartKey)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    // Menyimpan pilihan shipping ke session
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

    // Menghapus shipping dari session
    public function clearShipping()
    {
        session()->forget('shipping');
        return redirect()->route('cart.index')->with('success', 'Metode pengiriman dihapus.');
    }
}
