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
        return view('cart.index', compact('cart'));
    }

    // Menambahkan produk ke cart
    public function add(Request $request)
    {
        // Ambil produk dari database sesuai ID
        $product = Product::findOrFail($request->id);

        $cart = session()->get('cart', []);

        // Jika produk sudah ada di cart, tambahkan quantity-nya
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Jika belum, tambahkan baru dari database
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image // ambil gambar sesuai ID dari database
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Mengupdate jumlah produk di cart
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            if ($request->action === 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($request->action === 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // Menghapus produk dari cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
}
