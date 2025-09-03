<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductFrontController extends Controller
{
         public function index()
    {
        $products = Product::all(); // ambil semua data produk
        return view('products.index', compact('products'));
    }
}
