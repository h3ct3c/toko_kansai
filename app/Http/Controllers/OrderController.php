<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /* ===========================================================
   👤 BAGIAN UNTUK USER
=========================================================== */
public function store(Request $request)
{
    $data = $request->validate([
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
        'items.*.price' => 'required|numeric|min:0',
        'items.*.color' => 'nullable|string|max:50',

        // alamat
        'jalan' => 'required|string|max:255',
        'provinsi' => 'required|string|max:100',
        'kota' => 'required|string|max:100',
        'kecamatan' => 'required|string|max:100',
        'kelurahan' => 'required|string|max:100',
        'kode_pos' => 'required|string|max:10',
        'nomor_telepon' => 'required|string|max:20',
    ]);

    // Buat order utama
    $order = Order::create([
        'customer_id' => Auth::id(),
        'status' => 'pending',
        'total_price' => 0,
        'jalan' => $data['jalan'],
        'provinsi' => $data['provinsi'],
        'kota' => $data['kota'],
        'kecamatan' => $data['kecamatan'],
        'kelurahan' => $data['kelurahan'],
        'kode_pos' => $data['kode_pos'],
        'nomor_telepon' => $data['nomor_telepon'],
    ]);

    $total = 0;

    foreach ($data['items'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;

        // Satukan warna ke nama produk tanpa nambah kolom baru
        $productName = $item['product_name'] ?? 'Produk Tanpa Nama';
        if (!empty($item['color'])) {
            $productName .= ' (' . ucfirst($item['color']) . ')';
        }

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item['product_id'],
            'product_name' => $productName, // nama udah ada warna
            'product_image' => $item['product_image'] ?? null,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'total' => $subtotal,
            // gak perlu column color, aman
        ]);
    }

    $order->update(['total_price' => $total]);

    return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
}

public function index($id)
{
    $orders = Order::with('items')->findOrFail($id);
    return view('order.index', compact('orders'));
}

public function show()
{
    $orders = Order::where('customer_id', Auth::id())->get();
    return view('order.show', compact('orders'));
}



    //------*BAGIAN UNTUK ADMIN (ORDER CRUD)*------//

    public function orderCrudIndex()
    {
        $orders = Order::with('customer')->latest()->get();
        return view('order_crud.index', compact('orders'));
    }

    // ➕ Form tambah order manual (admin)
    public function orderCrudCreate()
    {
        $customers = User::all(); // ambil semua user untuk dropdown customer
        $products = Product::all(); // ambil semua produk untuk dropdown produk
        return view('order_crud.create', compact('customers', 'products'));
    }

    // 💾 Simpan order baru
    public function orderCrudStore(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string',

            // alamat
            'jalan' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:100',
            'kota' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        $product = Product::find($request->product_id);
        $total_price = $product->price * $request->quantity;

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'status' => $request->status,
            'total_price' => $total_price,

            // alamat
            'jalan' => $request->jalan,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        // Buat item order
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'total' => $total_price,
        ]);

        return redirect()->route('orderCrud.index')->with('success', 'Order berhasil ditambahkan!');
    }

    // ✏️ Form edit order
    public function orderCrudEdit($id)
    {
        $order = Order::with('items')->findOrFail($id);
        $customers = User::all();
        $products = Product::all();
        
        return view('order_crud.edit', compact('order', 'customers', 'products'));
    }

    // 🔁 Update order
    public function orderCrudUpdate(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string',

            // alamat
            'jalan' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:100',
            'kota' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'nomor_telepon' => 'nullable|string|max:20',
        ]);

        $order = Order::with('items')->findOrFail($id);
        $product = Product::find($request->product_id);
        $total_price = $product->price * $request->quantity;

        // update order utama
        $order->update([
            'customer_id' => $request->customer_id,
            'status' => $request->status,
            'total_price' => $total_price,

            // alamat
            'jalan' => $request->jalan,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        // update item order
        if ($order->items->isNotEmpty()) {
            $order->items->first()->update([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'total' => $total_price,
            ]);
        }

        return redirect()->route('orderCrud.index')->with('success', 'Order berhasil diperbarui!');
    }

    // ❌ Hapus order
    public function orderCrudDestroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orderCrud.index')->with('success', 'Order berhasil dihapus!');
    }
}
