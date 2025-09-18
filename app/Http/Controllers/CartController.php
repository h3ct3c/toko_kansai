<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    // 🛒 Tampilkan isi cart user
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())
                    ->with('items.product')
                    ->first();

        // kalau cart ada → ambil itemnya, kalau tidak → buat collection kosong
        $cartItems = $cart ? $cart->items : collect();

        return view('cart.index', compact('cart', 'cartItems'));
    }

    // ➕ Tambah produk ke cart
    public function addToCart($productId)
    {
        $userId = auth()->id();

        // pastikan produk valid
        $product = Product::findOrFail($productId);

        // cari atau buat cart user
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        // cari item di cart (produk yang sama)
        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity'   => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // 🔄 Update jumlah produk
    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::findOrFail($id);

        $item->update([
            'quantity' => $request->quantity
        ]);

        return back()->with('success', 'Jumlah produk berhasil diperbarui!');
    }

    // ❌ Hapus produk dari cart
    public function removeItem($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
