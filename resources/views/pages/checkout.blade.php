@include("layout.header")

<div class="mb-10"></div>

<div class="container mx-auto p-6">
  <div class="flex flex-col md:flex-row gap-8">
    
    <!-- Bagian kiri (Billing Details) -->
    <div class="w-full md:w-2/3">
      <h2 class="text-2xl font-semibold mb-4">Billing Details</h2>
      <form class="space-y-4">
        <div>
          <label class="block text-sm font-medium">Name*</label>
          <input type="text" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Company Name (optional)</label>
          <input type="text" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Street Address*</label>
          <input type="text" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Apartment, floor, etc. (optional)</label>
          <input type="text" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Town/City*</label>
          <input type="text" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Phone Number*</label>
          <input type="text" class="w-full border rounded-md p-2" />
        </div>
        <div>
          <label class="block text-sm font-medium">Email Address*</label>
          <input type="email" class="w-full border rounded-md p-2" />
        </div>
      </form>
    </div>

    <!-- Bagian kanan (Order Summary) -->
    <div class="w-full md:w-1/3 border-t md:border-t-0 md:border-l md:pl-6 mt-6">
      <!-- Produk -->
      <div class="space-y-3 mb-4">
        <div class="flex items-center justify-between border rounded-md p-2">
          <div class="flex items-center gap-3">
            <img src="/img/KANSAI FTALIT DUO.png" class="w-12 h-12" />
            <p>KANSAI ANTI-MOSQUITO</p>
          </div>
          <span class="text-red-500">Rp.94.000</span>
        </div>
        <div class="flex items-center justify-between border rounded-md p-2">
          <div class="flex items-center gap-3">
            <img src="/img/KANSAI GLIMMER.png" class="w-12 h-12" />
            <p>KANSAI ANTI-MOSQUITO</p>
          </div>
          <span class="text-red-500">Rp.100.000</span>
        </div>
      </div>

      <!-- Ringkasan -->
      <div class="space-y-2 text-sm mb-4">
        <div class="flex justify-between"><span>Shipping:</span><span>Free</span></div>
        <div class="flex justify-between"><span>Subtotal:</span><span>Rp.194.000</span></div>
        <div class="flex justify-between font-semibold"><span>Total:</span><span>Rp.194.000</span></div>
      </div>

      <!-- Payment -->
      <div class="space-y-2 mb-4">
        <label class="flex items-center gap-2">
          <input type="radio" name="payment" class="accent-blue-600" /> Bank
        </label>
        
        <label class="flex items-center gap-2">
          <input type="radio" name="payment" class="accent-blue-600" /> Cash on delivery
        </label>
      </div>

      <!-- Tombol -->
      <a href="/payment success">
      <button class="w-full bg-blue-900 text-white py-2 rounded-md hover:bg-sky-400">
        Place Order
      </button>
      </a>
    </div>
  </div>
</div>



  <div class="mb-96"></div>

@include('layout.footer')