<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input user dari form
        $query = $request->input('query');

        // Cari produk yang namanya persis sama dengan keyword
        $product = Product::where('name', $query)->first();

        // Kalau tidak ketemu, kasih pesan
        if (!$product) {
            return view('product', ['message' => 'Produk dengan nama "'.$query.'" tidak ditemukan']);
        }

        // Kalau ketemu, kirim data produk ke view
        return view('product', ['product' => $product]);
    }
}
