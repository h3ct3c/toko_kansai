@include("layout.header")

<div class="py-12">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-2">
        <h1 class="text-4xl font-bold text-blue-900 mb-8 border-b pb-3">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-10">

            {{-- FORM CHECKOUT --}}
            <div class="w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-lg shadow-xl border border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">{{ __('messages.Shipping & Payment Details') }}</h2>

                <form id="checkoutForm" class="space-y-6">
                    @csrf

                    {{-- HIDDEN ORDER ID --}}
                    <input type="hidden" id="order_id" name="order_id" value="{{ $order->id ?? '' }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Full Name*') }}</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div class="md:col-span-2">
                            <label for="jalan" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Street Address*') }}</label>
                            <input type="text" id="jalan" name="jalan" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div>
                            <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Province*') }}</label>
                            <input type="text" id="provinsi" name="provinsi" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div>
                            <label for="kota" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.City*') }}</label>
                            <input type="text" id="kota" name="kota" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.District*') }}</label>
                            <input type="text" id="kecamatan" name="kecamatan" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div>
                            <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Subdistrict*') }}</label>
                            <input type="text" id="kelurahan" name="kelurahan" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div>
                            <label for="kode_pos" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Postal Code*') }}</label>
                            <input type="text" id="kode_pos" name="kode_pos" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div>
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Phone Number*') }}</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" value="{{ Auth::user()->nomor_telepon ?? '' }}" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>

                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('messages.Email Address*') }}</label>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-blue-600 focus:border-blue-600 transition">
                        </div>
                    </div>

                    {{-- PEMBAYARAN --}}
                    <div class="pt-4 border-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('messages.Payment Method*') }}</h3>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 border border-gray-300 p-4 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="radio" name="payment_method" value="COD" checked class="h-5 w-5 text-blue-600 accent-blue-600">
                                <span class="text-gray-900 font-medium flex-grow">Cash on Delivery (COD)</span>
                            </label>
                            <label class="flex items-center gap-3 border border-gray-300 p-4 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                                <input type="radio" name="payment_method" value="Midtrans" class="h-5 w-5 text-blue-600 accent-blue-600">
                                <span class="text-gray-900 font-medium flex-grow">{{ __('messages.Bayar via Bank / E-Wallet') }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="button" id="payBtn"
                            class="w-full bg-blue-900 text-white font-semibold p-4 rounded-lg shadow-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-700 focus:ring-opacity-50 transition">
                            {{ __('messages.Lanjutkan Pembayaran') }}
                        </button>
                    </div>
                </form>
            </div>

            {{-- RINGKASAN PESANAN --}}
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-6 md:p-8 rounded-lg shadow-xl border border-gray-200 sticky top-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">{{ __('messages.Order Summary') }}</h2>

                    <div class="space-y-4 mb-6 max-h-96 overflow-y-auto pr-2">
    @foreach($cart as $cartKey => $item)
        <div class="flex justify-between border-b pb-3 last:border-b-0">

            <!-- KIRI: gambar + nama -->
            <div class="flex gap-4">
                <img
                    src="{{ asset('img/' . $item['image']) }}"
                    class="w-16 h-16 object-cover rounded-md border shrink-0"
                    alt="{{ $item['name'] }}"
                />

                <div class="max-w-xs">
                    <p class="font-medium text-gray-800 leading-snug break-words">
                        {{ $item['name'] }}
                    </p>

                    @if(!empty($item['color']))
                        <div class="flex items-center gap-1 mt-1 text-sm text-gray-500">
                            <span
                                class="inline-block w-3 h-3 rounded-full border shrink-0"
                                style="background-color: {{ $item['color'] }};"
                            ></span>
                            <span>{{ ucfirst($item['color']) }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- KANAN: qty + harga -->
            <div class="flex flex-col items-end justify-center">
                <p class="text-sm text-gray-500">
                    Qty: {{ $item['quantity'] }}
                </p>

                <span class="text-base font-semibold text-red-600">
                    Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                </span>
            </div>

        </div>
    @endforeach
</div>


                    <div class="border-t border-gray-200 pt-6 space-y-3">
                        <div class="flex justify-between text-gray-700">
                            <span>Subtotal:</span>
                            <span class="font-medium">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        <div class="flex justify-between font-bold text-xl border-t border-gray-300 pt-3 mt-3">
                            <span>Total:</span>
                            <span class="text-gray-900">Rp{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MIDTRANS SANDBOX --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
document.getElementById('payBtn').addEventListener('click', async function() {
    const selectedPayment = document.querySelector('input[name="payment_method"]:checked').value;
    const form = document.getElementById('checkoutForm');

    if (selectedPayment === 'COD') {
        form.action = "{{ route('checkout.store') }}";
        form.method = "POST";
        form.submit();
        return;
    }

    // MIDTRANS PAYMENT
    fetch("/payment/token", {
        method: "POST",
        headers: { 
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            total_price: {{ $total }},
            name: "{{ Auth::user()->name }}",
            email: "{{ Auth::user()->email }}",
            nomor_telepon: "{{ Auth::user()->nomor_telepon ?? '0812345678' }}"
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.snap_token) {
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    console.log('Payment Success:', result);
                    window.location.href = "/order-success";
                },
                onPending: function(result) {
                    console.log('Payment Pending:', result);
                },
                onError: function(result) {
                    console.error('Payment Error:', result);
                    alert("Terjadi kesalahan pada pembayaran.");
                }
            });
        } else {
            alert(data.error || 'Gagal memuat Midtrans');
        }
    })
    .catch(err => {
        console.error(err);
        alert("Gagal menghubungi server pembayaran.");
    });
});
</script>

<div class="mb-[350px]"></div>

@include("layout.footer")
