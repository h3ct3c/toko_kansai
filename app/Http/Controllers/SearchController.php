<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // ambil keyword dari form input bernama 'query'
        $keyword = trim($request->input('query', ''));

        // kalau keyword kosong tampilkan semua produk
        if ($keyword === '') {
            $products = Product::all();
        } else {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        }

        // kirim keyword + produk ke view
        return view('searchview', [
            'products' => $products,
            'keyword'  => $keyword,   // <-- penting
        ]);
    }
}
