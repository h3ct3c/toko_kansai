<?php

// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        $item = CartItem::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $request->product_id
            ],
            [
                'quantity' => \DB::raw("quantity + {$request->quantity}")
            ]
        );

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return back();
    }

    public function clear()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        if ($cart) {
            $cart->items()->delete();
        }
        return back();
    }
}
