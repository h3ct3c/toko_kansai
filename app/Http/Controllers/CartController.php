<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    // 🛒 Tampilkan cart user
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())
                    ->with('items.product')
                    ->first();

        $total = $cart ? $cart->items->sum('subtotal') : 0;

        return view('cart.index', compact('cart', 'total'));
    }

    // ➕ Tambah produk ke cart
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Cari cart user, kalau belum ada buat baru
        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        // Cek kalau produk sudah ada di cart
        $item = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $product->id)
                        ->first();

        if ($item) {
            $item->quantity += 1;
            $item->subtotal = $item->quantity * $product->price;
            $item->save();
        } else {
            CartItem::create([
                'cart_id'   => $cart->id,
                'product_id'=> $product->id,
                'quantity'  => 1,
                'subtotal'  => $product->price
            ]);
        }

        return redirect()->route('cart.index')->with('success','Produk ditambahkan ke keranjang');
    }

    // ❌ Hapus item dari cart
    public function destroy($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return back()->with('success','Produk dihapus dari keranjang');
    }
}
