<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', auth()->id())->where('id', $id)->first();
        if ($cart) {
            $cart->delete();
        }

        return response()->json(['success' => true]);
    }
}

