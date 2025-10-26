@include('layout.header')

<div class="mt-10"></div>

<div class="bg-white">
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">
      
      <!-- Product Images -->
      <div class="w-full md:w-1/2 px-4 mb-8">
        <img 
          id="mainImage"
          src="{{ asset('img/' . $product->image) }}"
          alt="{{ $product->name }}"
          class="w-full h-auto rounded-lg shadow-md mb-4 bg-gray-100 p-10">

        <!-- Thumbnail -->
        <div class="flex gap-4 py-4 justify-center overflow-x-auto">
          @php
              $thumbnails = [
                  asset('img/' . $product->image),
                  asset('img/' . $product->image),
                  asset('img/' . $product->image),
                  asset('img/' . $product->image),
              ];
          @endphp

          @foreach($thumbnails as $thumb)
            <img 
              src="{{ $thumb }}"
              alt="Thumbnail"
              class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
              onclick="changeImage(this.src)">
          @endforeach
        </div>
      </div>

      <!-- Product Details -->
      <div class="w-full md:w-1/2 px-4">
        <!-- Title -->
        <h2 class="text-3xl font-bold mb-2">{{ $product->name }}</h2>
        <p class="text-gray-600 mb-4">Stock : {{ $product->stock ?? 'N/A' }}</p>
        
        <!-- Harga -->
        <div class="mb-4">
          <span id="productPrice" class="text-2xl font-bold mr-2">
            Rp.{{ number_format($product->price, 0, ',', '.') }}
          </span>
          @if($product->old_price)
            <span class="text-gray-500 line-through">
              Rp.{{ number_format($product->old_price, 0, ',', '.') }}
            </span>
          @endif
        </div>

        <!-- Rating -->
        <div class="flex items-center mb-4">
          @for($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                fill="currentColor"
                class="size-6 text-yellow-500">
              <path fill-rule="evenodd" 
                    d="M10.788 3.21c.448-1.077 1.976-1.077 
                       2.424 0l2.082 5.006 5.404.434c1.164.093 
                       1.636 1.545.749 2.305l-4.117 3.527 
                       1.257 5.273c.271 1.136-.964 2.033-1.96 
                       1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425
                       l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212
                       .749-2.305l5.404-.434 2.082-5.005Z" 
                    clip-rule="evenodd" />
            </svg>
          @endfor
          <span class="ml-2 text-gray-600">4.5 (120 reviews)</span>
        </div>
        
        <!-- Description -->
        <p class="text-gray-700 mb-6">
          {{ $product->description }}
        </p>

        <!-- Add to cart form -->
        <form action="{{ route('cart.add') }}" method="POST" id="addToCartForm">
          @csrf
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="color" id="selectedColor" value="">

          <!-- Color Options -->
          <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Color:</h3>
            <div class="flex space-x-2" id="colorButtons">
              <button type="button" data-color="Gray" class="w-8 h-8 bg-stone-400 rounded-full border-2 border-transparent"></button>
              <button type="button" data-color="Red" class="w-8 h-8 bg-red-500 rounded-full border-2 border-transparent"></button>
              <button type="button" data-color="Orange" class="w-8 h-8 bg-orange-500 rounded-full border-2 border-transparent"></button>
              <button type="button" data-color="Yellow" class="w-8 h-8 bg-yellow-500 rounded-full border-2 border-transparent"></button>
              <button type="button" data-color="Green" class="w-8 h-8 bg-green-500 rounded-full border-2 border-transparent"></button>
              <button type="button" data-color="Blue" class="w-8 h-8 bg-blue-500 rounded-full border-2 border-transparent"></button>
              <button type="button" data-color="Indigo" class="w-8 h-8 bg-indigo-500 rounded-full border-2 border-transparent"></button>
            </div>
          </div>

          <!-- Quantity -->
          <div class="mb-6">
            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
            <input 
              type="number" 
              id="quantity" 
              name="quantity" 
              min="1" 
              value="1"
              class="w-16 text-center rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              oninput="updatePrice()"
            >
          </div>

          <!-- Add to cart -->
          <button type="submit" class="bg-blue-900 flex gap-2 items-center text-white px-6 py-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 mb-5">
              <svg xmlns="http://www.w3.org/2000/svg" 
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5" 
                  stroke="currentColor" 
                  class="size-6">
                <path stroke-linecap="round" 
                      stroke-linejoin="round"
                      d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 
                        14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 
                        2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 
                        14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 
                        .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 
                        0 .75.75 0 0 1 1.5 0Z" />
              </svg>
              Add to Cart
          </button>
        </form>

        <!-- Key features -->
        <div>
          <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
          <ul class="list-disc list-inside text-gray-700">
            <li>Daya tutup sangat baik</li>
            <li>Tahan cuaca</li>
            <li>Daya rekat sangat baik</li>
            <li>Tidak mengandung timbal dan logam berat</li>
            <li>Tidak cepat menguning</li>
            <li>Dapat diaplikasikan pada permukaan kayu</li>
          </ul> 
        </div>
      </div>
    </div>
  </div>

  <script>
    function changeImage(src) {
      document.getElementById('mainImage').src = src;
    }

    const basePrice = {{ $product->price }};
    const priceElement = document.getElementById("productPrice");
    const quantityInput = document.getElementById("quantity");

    function updatePrice() {
      let qty = parseInt(quantityInput.value) || 1;
      let total = basePrice * qty;
      priceElement.textContent = formatRupiah(total);
    }

    function formatRupiah(angka) {
      return "Rp." + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Warna
    const colorButtons = document.querySelectorAll('#colorButtons button');
    const colorInput = document.getElementById('selectedColor');

    colorButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        colorButtons.forEach(b => b.classList.remove('ring-2', 'ring-offset-2', 'ring-blue-500'));
        btn.classList.add('ring-2', 'ring-offset-2', 'ring-blue-500');
        colorInput.value = btn.getAttribute('data-color');
      });
    });
  </script>
</div>

<div class="mb-40"></div>
<div class="border-t border-gray-400 w-11/12 mx-auto"></div>
<div class="mb-40"></div>

<!-- Related Products -->
<div class="mt-3 max-w-full grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-12 justify-items-center">
  @foreach($related as $item)
    <div class="group border rounded-md overflow-hidden max-w-[200px] mx-auto hover:shadow-lg transition-shadow">
      <a href="{{ route('products.show', $item->id) }}">
        <img src="{{ asset('img/' . $item->image) }}" 
             alt="{{ $item->name }}"
             class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
          <h3 class="text-sm text-gray-700 font-semibold">{{ $item->name }}</h3>
          <p class="mt-3 text-sm text-red-500 font-semibold">
            Rp.{{ number_format($item->price, 0, ',', '.') }}
          </p>
          <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
      </a>
    </div>
  @endforeach
</div>

<div class="mb-96"></div>

@include('layout.footer')
