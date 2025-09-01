<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('product_crud.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('product_crud.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'color' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'color' => $request->color,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('product_crud.index')
            ->with('success','Product created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product_crud.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('product_crud.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([   
            'name' => 'required',
            'category' => 'required',
            'color' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'color' => $request->color,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('product_crud.index')
            ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product_crud.index')
            ->with('success','Product deleted successfully.');
    }
}
