<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // 1) Ambil keyword dari form
        $query = trim($request->input('query', ''));

        // 2) Kalau kosong, balikin pesan error
        if ($query === '') {
            return redirect()->back()->with('error', 'Masukkan kata kunci terlebih dahulu.');
        }

        // 3) Pencarian LIKE -> cari produk yang MENGANDUNG keyword
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        // 4) Kalau tidak ada hasil
        if ($products->isEmpty()) {
            return view('product', [
                'message' => 'Produk dengan kata kunci "'.$query.'" tidak ditemukan',
            ]);
        }

        // 5) Kirim semua hasil produk ke view
        return view('product', [
            'products' => $products,
        ]);
    }
}
