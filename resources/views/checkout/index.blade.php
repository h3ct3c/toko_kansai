@include("layout.header")

<div class="mb-12"></div>

<div class="container mx-auto p-6 shadow-md bg-white rounded-md">
  <div class="flex flex-col md:flex-row gap-8">
    
    <!-- Bagian kiri (Billing Details) -->
    <div class="w-full md:w-2/3">
      <h2 class="text-2xl font-semibold mb-4">Billing Details</h2>

      <form id="billingForm" method="POST" action="{{ route('checkout.store') }}" class="space-y-4">
        @csrf

        <div>
          <label class="block text-sm font-medium">Name*</label>
          <input type="text" name="name" required class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Company Name (optional)</label>
          <input type="text" name="company" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Street Address*</label>
          <input type="text" name="address" required class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Town/City*</label>
          <input type="text" name="city" required class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Phone Number*</label>
          <input type="text" name="phone" required class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Email Address*</label>
          <input type="email" name="email" required class="w-full border rounded-md p-2" />
        </div>

        <!-- Payment Method -->
        <div class="space-y-2 mb-6">
          <label class="flex items-center gap-2">
            <input type="radio" name="shipping_method" value="JNE" checked class="accent-blue-600" /> 
            cash on delivery (COD)
          </label>
        </div>

        <button id="payBtn" disabled class="w-full bg-blue-900 text-white p-3 rounded-md opacity-50 cursor-not-allowed transition duration-300 ease-in-out">
          Proceed to Payment
        </button>
      </form>
    </div>

    <!-- Bagian kanan (Order Summary) -->
    <div class="w-full md:w-1/3 border-t md:border-t-0 md:border-l md:pl-6 mt-6">
      <!-- Produk -->
      <div class="space-y-3 mb-[33px]">
        @foreach($products as $product)
        <div class="flex items-center justify-between border rounded-md p-2">
          <div class="flex items-center gap-6">
            <img src="{{ asset('img/' . $product->image) }}" class="w-12 h-12" />
            <p>{{ $product->name }}</p>
          </div>
          <span class="text-red-500">
            Rp{{ number_format($product->price * $cart[$product->id]['quantity'], 0, ',', '.') }}
          </span>
        </div>
        @endforeach
      </div>

      <!-- Ringkasan -->
      <div class="space-y-2 text-sm mb-4">
        <div class="flex justify-between font-normal"><span>Shipping:</span><span>Free</span></div>
        <div class="flex justify-between font-normal"><span>Subtotal:</span>
          <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between font-bold"><span>Total:</span>
          <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mb-[400px]"></div>

@include("layout.footer")

<script>
  const form = document.getElementById('billingForm');
  const payBtn = document.getElementById('payBtn');

  function checkForm() {
    const name = form.querySelector('input[name="name"]').value.trim();
    const address = form.querySelector('input[name="address"]').value.trim();
    const city = form.querySelector('input[name="city"]').value.trim();
    const phone = form.querySelector('input[name="phone"]').value.trim();
    const email = form.querySelector('input[name="email"]').value.trim();
    const valid = name && address && city && (phone || email);

    if (valid) {
      payBtn.disabled = false;
      payBtn.classList.remove("opacity-50", "cursor-not-allowed");
    } else {
      payBtn.disabled = true;
      payBtn.classList.add("opacity-50", "cursor-not-allowed");
    }
  }

  form.addEventListener('input', checkForm);
</script>
