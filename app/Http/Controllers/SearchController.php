<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query dari input form
        $query = trim($request->input('query', ''));

        // Jika kosong → ambil semua produk
        if ($query === '') {
            $products = Product::all();
        } else {
            // Ambil data lengkap (wajib ada kolom image!)
            $products = Product::where('name', 'like', '%' . $query . '%')->get();
        }

        // Kirim ke view
        return view('layout.searchview', [
            'products' => $products,
            'category_id' => null,
            'keyword'  => $query,
        ]);
    }
}
