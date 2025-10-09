@include("layout.header")

<h2>Order #{{ $order->id }}</h2>
<p>Status: {{ ucfirst($order->status) }}</p>
<p>Total Items: {{ $order->total_items }}</p>
<p>Total Harga: Rp{{ number_format($order->total_price,0,',','.') }}</p>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp{{ number_format($item->price,0,',','.') }}</td>
                <td>Rp{{ number_format($item->total,0,',','.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
