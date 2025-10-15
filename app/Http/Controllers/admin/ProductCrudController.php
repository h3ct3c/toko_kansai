<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class ProductCrudController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('product_crud.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('product_crud.create', compact('categories', 'colors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color_id'    => 'required|exists:colors,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Simpan ke folder public/img
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);

            // Simpan path-nya ke database
            $data['image'] = 'img/' . $filename;
        }

        Product::create($data);

        return redirect()->route('product_crud.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('product_crud.edit', compact('product', 'categories', 'colors'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color_id'    => 'required|exists:colors,id',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama (kalau ada)
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            // Upload gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);

            $data['image'] = 'img/' . $filename;
        }

        $product->update($data);

        return redirect()->route('product_crud.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Hapus file gambar di folder public/img
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('product_crud.index')->with('success', 'Product deleted successfully.');
    }

    public function showAdmin(Product $product)
    {
        return view('product_crud.show', compact('product'));
    }
}
