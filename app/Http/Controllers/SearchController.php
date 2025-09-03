<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
     public function search(Request $request)
    {
        // ambil kata kunci dari input
        $keyword = $request->input('query');

        // cari produk berdasarkan nama atau deskripsi
        $products = Product::where('name', 'LIKE', "%$keyword%")
                   ->paginate(10);

        // kirim hasil ke view
        return view('search', compact('products', 'keyword'));

    }
}
