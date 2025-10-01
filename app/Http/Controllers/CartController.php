<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity'   => 'nullable|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $qty = $request->quantity ?? 1;

        // cek stok bila ada kolom stok
        if (isset($product->stock) && $product->stock < $qty) {
            return response()->json(['success' => false, 'message' => 'Stok tidak cukup'], 400);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $qty,
                'image'    => $product->image ?? null,
            ];
        }

        session(['cart' => $cart]);

        // hitung total item
        $cartCount = 0;
        foreach ($cart as $item) $cartCount += $item['quantity'];

        return response()->json([
            'success'    => true,
            'cart_count' => $cartCount,
            'cart'       => $cart
        ]);
    }

    // tambahkan update/remove jika perlu (logika mirip: edit session 'cart' lalu return JSON)
}
