<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('product.index', compact('products'));
    }

    public function byCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->paginate(12);
        return view('product.by_category', compact('products', 'category'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $related = Product::where('category_id', $product->category_id)
                          ->where('id', '!=', $product->id)
                          ->limit(5)
                          ->get();

        return view('product.show', compact('product', 'related'));
    }
}
