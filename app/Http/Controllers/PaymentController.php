<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
   public function getToken(Request $request)
{
    try {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $order_id = 'ORDER-' . uniqid();

        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => (int) $request->total_price > 0 ? (int) $request->total_price : 1000,
            ],
            'customer_details' => [
                'first_name' => $request->name ?? 'Customer',
                'email' => $request->email ?? 'email@example.com',
                'phone' => $request->nomor_telepon ?? '0812345678',
            ],
            'item_details' => [[
                'id' => 'TEMP-1',
                'price' => (int) $request->total_price > 0 ? (int) $request->total_price : 1000,
                'quantity' => 1,
                'name' => 'Checkout sementara',
            ]],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken, 'order_id' => $order_id]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Gagal mendapatkan token Midtrans: ' . $e->getMessage()], 500);
    }
}

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $signature = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($signature !== $request->signature_key) {
            return response()->json(['message' => 'Signature tidak valid'], 403);
        }

        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['message' => 'Order tidak ditemukan'], 404);
        }

        $status = match ($request->transaction_status) {
            'capture', 'settlement' => 'paid',
            'pending' => 'pending',
            default => 'failed',
        };

        $order->update(['status' => $status]);

        return response()->json(['message' => 'Callback processed']);
    }
}
