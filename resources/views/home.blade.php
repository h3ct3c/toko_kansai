@include("layout.header")

@include("layout.banner")

<div class="mb-[200px]"></div>

<div class="text-center">
    <div class="text-4xl font-bold mb-4 text-blue-900">Jelajahi Kategori Produk Kami</div>
    <div class="text-gray-600 mb-8">Temukan cat berkualitas untuk setiap kebutuhan Anda</div>
</div>

<!-- Bawah Banner -->
<section class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 px-6 lg:px-16 py-12">
    <!-- Card 1 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_12.jpg" alt="Premium" 
             class="w-full h-[420px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Premium</h2>
            <a href="/premium"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                Explore
            </a>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_5.jpg" alt="Eksterior" 
             class="w-full h-[420px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Eksterior</h2>
            <a href="/eksterior"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
                Explore
            </a>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_7.jpg" alt="Interior" 
             class="w-full h-[420px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Interior</h2>
            <a href="/interior"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                Explore
            </a>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_6.jpg" alt="Kayu & Besi" 
             class="w-full h-[420px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Kayu & Besi</h2>
            <a href="/kayubesi"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                Explore
            </a>
        </div>
    </div>
</section>

<div class="mb-[140px]"></div>

<!-- Produk Unggulan -->
<div class="text-center">
  <div class="text-4xl font-bold mb-20 text-blue-900">Produk Unggulan</div>
</div>

<!-- Produk -->
<div class="mt-12 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-12 justify-items-center">

  <!-- item 1 -->
   @php
    $product = \App\Models\Product::find(1);
@endphp

<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="{{ url('product/' . $product->id) }}">
        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
            <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
            <p class="mt-3 text-sm text-red-500 font-semibold">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
    </a>
</div>

  
  <!-- item 2 -->
   @php
    $product = \App\Models\Product::find(13);
@endphp

<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="{{ url('product/' . $product->id) }}">
        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
            <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
            <p class="mt-3 text-sm text-red-500 font-semibold">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
    </a>
</div>

  <!-- item 3 -->
   @php
    $product = \App\Models\Product::find(4);
@endphp

<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="{{ url('product/' . $product->id) }}">
        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
            <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
            <p class="mt-3 text-sm text-red-500 font-semibold">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
    </a>
</div>

  <!-- item 4 -->
   @php
    $product = \App\Models\Product::find(6);
@endphp

<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="{{ url('product/' . $product->id) }}">
        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
            <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
            <p class="mt-3 text-sm text-red-500 font-semibold">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
    </a>
</div>

  <!-- item 5 -->
   @php
    $product = \App\Models\Product::find(3);
@endphp

<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="{{ url('product/' . $product->id) }}">
        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
            <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
            <p class="mt-3 text-sm text-red-500 font-semibold">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
    </a>
</div>
</div>

<div class="mb-[360px]"></div>

@include('layout.footer')
