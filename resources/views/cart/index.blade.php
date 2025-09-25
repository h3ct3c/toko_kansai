


@include('layout.header')


<div class="mb-20"></div>
<h2>Keranjang Belanja</h2>

@if($cart && $cart->items->count())
    <ul>
        @foreach($cart->items as $item)
            <li>
                {{ $item->product->name }} - 
                {{ $item->quantity }} x Rp{{ number_format($item->product->price) }} = 
                Rp{{ number_format($item->subtotal) }}

                <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h3>Total: Rp{{ number_format($total) }}</h3>
@else
    <p>Keranjang masih kosong.</p>
@endif
