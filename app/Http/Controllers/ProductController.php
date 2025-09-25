<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Admin: tampilkan semua produk (CRUD).
     */
    public function index()
    {
        $products = Product::with(['category', 'color'])->latest()->paginate(10);
        return view('product_crud.index', compact('products'));
    }

    /**
     * Admin: form create.
     */
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('product_crud.create', compact('categories', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'image_url'   => 'nullable|string', 
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'color_id'    => 'required|exists:colors,id',
        ]);

        Product::create($request->only([
            'name','image_url','price','stock','category_id','color_id'
        ]));

        return redirect()->route('product_crud.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('product_crud.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('product_crud.edit', compact('product', 'categories', 'colors'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required',
            'image_url'   => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'color_id'    => 'required|exists:colors,id',
        ]);

        $product->update($request->only([
            'name','image_url','price','stock','category_id','color_id'
        ]));

        return redirect()->route('product_crud.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product_crud.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Frontend: tampilkan produk sebagai kartu (untuk user).
     */
    public function productList()
    {
        $products = Product::with(['category','color'])->get();
        return view('products.index', compact('products'));
    }
}
