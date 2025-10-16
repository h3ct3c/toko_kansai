@include("layout.header")

<div class="container mx-auto py-12 px-6">
    <h1 class="text-4xl font-bold mb-10 text-blue-900">MY SHOPPING CART</h1>

    @if (session('success'))
    @php
        $isDeleted = str_contains(session('success'), 'dihapus');
    @endphp

    <div id="alert-message" 
        class="{{ $isDeleted ? 'bg-red-100 border-red-500 text-red-700' : 'bg-green-100 border-green-500 text-green-700' }} border-l-4 p-4 rounded mb-5">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 1080);
    </script>
@endif

    @if($cart && count($cart) > 0)
        @php $total = 0; @endphp

        <div class="overflow-hidden bg-white rounded-2xl shadow-md">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="py-4 px-6 text-left">Product</th>
                        <th class="py-4 px-6 text-center">Quantity</th>
                        <th class="py-4 px-6 text-right">Price</th>
                        <th class="py-4 px-6 text-right">Total</th>
                        <th class="py-4 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity']; 
                            $total += $subtotal; 
                        @endphp
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-4 px-6 flex items-center space-x-3">
                                <img src="{{ asset('img/'. $item['image']) }}" 
                                  alt="{{ $item['name'] }}" 
                                  class="w-16 h-16 object-cover rounded-lg shadow">
                                <span class="font-medium text-gray-800">{{ $item['name'] }}</span>
                            </td>

                            <!-- Quantity controls -->
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('cart.update') }}" method="POST" class="inline-flex items-center space-x-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" name="action" value="decrease"
                                            class="bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300">
                                        -
                                    </button>
                                    <span class="px-3 font-semibold">{{ $item['quantity'] }}</span>
                                    <button type="submit" name="action" value="increase"
                                            class="bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300">
                                        +
                                    </button>
                                </form>
                            </td>

                            <td class="py-4 px-6 text-right text-gray-700">
                                Rp{{ number_format($item['price'], 0, ',', '.') }}
                            </td>

                            <td class="py-4 px-6 text-right font-semibold text-gray-900">
                                Rp{{ number_format($subtotal, 0, ',', '.') }}
                            </td>

                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                        Remove
                                    </button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Shipping & total summary -->
        <div class="mt-8 grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold mb-3 text-gray-800">Shipping Method</h2>
                <form id="shipping-form">
                    <select id="shipping" name="shipping" class="w-full border rounded-lg p-3 text-gray-700 focus:ring-2 focus:ring-blue-600">
                        <option value="jne" data-cost="25000">JNE- Rp25.000</option>
                        <option value="jnt" data-cost="20000">SiNgacirr - Rp20.000</option>
                        <option value="sicepat" data-cost="18000">SiNgibrit - Rp18.000</option>
                        <option value="pickup" data-cost="0">Pick Up Sendiri - Gratis</option>
                    </select>
                </form>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold mb-3 text-gray-800">Order Summary</h2>

                <div class="flex justify-between py-2 text-gray-700">
                    <span>Subtotal</span>
                    <span id="subtotal" data-subtotal="{{ $total }}">Rp{{ number_format($total, 0, ',', '.') }}</span>
                </div>

                <div class="flex justify-between py-2 text-gray-700">
                    <span>Shipping</span>
                    <span id="shipping-cost">Rp25.000</span>
                </div>

                <div class="border-t mt-2 pt-3 flex justify-between font-bold text-lg text-gray-900">
                    <span>Total</span>
                    <span id="total">Rp{{ number_format($total + 25000, 0, ',', '.') }}</span>
                </div>

      <div>
        <a href="{{ route('checkout.index') }}">
        <button type="submit" 
                class="w-full md:w-auto px-6 py-3 font-semibold text-white rounded-md ms-[348px] mt-6
                       bg-blue-900 border border-blue-700 shadow-md shadow-blue-800 transition duration-200 ease-out
                       hover:opacity-80 hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-lg 
                       active:translate-x-2 active:translate-y-1 active:shadow-none
                       disabled:opacity-50 disabled:cursor-not-allowed">
          Proceed To Checkout
        </button>
        </a>
      </div>
            </div>
        </div>

    @else
        <div class="bg-white p-10 rounded-2xl shadow text-center text-gray-600">
            <i class="fas fa-shopping-cart text-6xl mb-4 text-gray-400"></i>
            <p class="text-lg">Your cart is empty.</p>
      <div>
        <a href="/"></a>
        <button type="submit" 
                class="w-full md:w-auto px-6 py-3 font-semibold text-white rounded-md items-center mt-6
                       bg-blue-900 border border-blue-700 shadow-md shadow-blue-800 transition duration-200 ease-out
                       hover:opacity-80 hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-lg 
                       active:translate-x-2 active:translate-y-1 active:shadow-none
                       disabled:opacity-50 disabled:cursor-not-allowed">
          Continue Shopping
        </button>
      </div>
        </div>
    @endif
</div>

<script>
    const shippingSelect = document.getElementById('shipping');
    const subtotalElement = document.getElementById('subtotal');
    const shippingCostElement = document.getElementById('shipping-cost');
    const totalElement = document.getElementById('total');

    function updateTotal() {
        const selectedOption = shippingSelect.options[shippingSelect.selectedIndex];
        const shippingCost = parseInt(selectedOption.dataset.cost);
        const subtotal = parseInt(subtotalElement.dataset.subtotal);
        const total = subtotal + shippingCost;

        shippingCostElement.textContent = 'Rp' + shippingCost.toLocaleString('id-ID');
        totalElement.textContent = 'Rp' + total.toLocaleString('id-ID');
    }

    shippingSelect.addEventListener('change', updateTotal);
    updateTotal(); // initial
</script>

<div class="mb-[380px]"></div>

@extends('layout.footer')