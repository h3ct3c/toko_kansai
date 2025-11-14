@include("layout.header")
@include("layout.banner")

<div class="mb-[200px]"></div>

<!-- Kategori Produk -->
<div class="text-center">
  <div class="text-4xl font-bold mb-4 text-blue-900">
    {{ __('messages.Home_ExploreCategories') }}
  </div>
  <div class="text-gray-600 mb-8">
    {{ __('messages.Home_FindQualityPaint') }}
  </div>
</div>

<!-- Kartu Kategori -->
<section class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 px-6 lg:px-16 py-12">
  @php
    $categories = [
      ['img' => 'kansai_12.jpg', 'title' => __('messages.Cat_Premium'), 'link' => '/premium'],
      ['img' => 'kansai_5.jpg', 'title' => __('messages.Cat_Exterior'), 'link' => '/eksterior'],
      ['img' => 'kansai_7.jpg', 'title' => __('messages.Cat_Interior'), 'link' => '/interior'],
      ['img' => 'kansai_6.jpg', 'title' => __('messages.Cat_WoodIron'), 'link' => '/kayubesi'],
    ];
  @endphp

  @foreach ($categories as $category)
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
      <img
        src="/img/{{ $category['img'] }}"
        alt="{{ $category['title'] }}"
        class="w-full h-[420px] object-cover transition-transform duration-500 group-hover:scale-110"
      >
      <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
      <div class="absolute bottom-6 left-6 text-white">
        <h2 class="text-2xl font-bold">{{ $category['title'] }}</h2>
        <a
          href="{{ $category['link'] }}"
          class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition"
        >
          {{ __('messages.Btn_Explore') }}
        </a>
      </div>
    </div>
  @endforeach
</section>

<div class="mb-[140px]"></div>

<!-- Banner Promo -->
<section class="py-16 bg-blue-900 text-white">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center">
      
      <div class="md:w-1/2 mb-8 md:mb-0">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
          {{ __('messages.Home_SummerSale') }}
        </h2>
        <p class="text-xl text-gray-300 mb-6">
          {{ __('messages.Home_SummerSaleDesc') }}
        </p>

        <!-- Promo sepecial -->
        <div class="flex gap-4 mb-8 text-white" id="countdown">
          <div class="bg-white/10 rounded-lg p-4 text-center">
            <span id="days" class="block text-3xl font-bold">00</span>
            <span class="text-sm text-gray-300">{{ __('messages.Time_Days') }}</span>
          </div>
          <div class="bg-white/10 rounded-lg p-4 text-center">
            <span id="hours" class="block text-3xl font-bold">00</span>
            <span class="text-sm text-gray-300">{{ __('messages.Time_Hours') }}</span>
          </div>
          <div class="bg-white/10 rounded-lg p-4 text-center">
            <span id="minutes" class="block text-3xl font-bold">00</span>
            <span class="text-sm text-gray-300">{{ __('messages.Time_Minutes') }}</span>
          </div>
          <div class="bg-white/10 rounded-lg p-4 text-center">
            <span id="seconds" class="block text-3xl font-bold">00</span>
            <span class="text-sm text-gray-300">{{ __('messages.Time_Seconds') }}</span>
          </div>
        </div>

        <a href="/product"
          class="inline-block py-3 px-8 bg-white text-gray-900 font-medium rounded-xl hover:bg-gray-100 transition transfrom hover:scale-95 ease-in-out">
          {{ __('messages.Btn_ShopSale') }}
        </a>
      </div>

    <div class="md:w-1/2">
      <img src="/img/kansai_4.jpg"
          alt="Summer Sale"
          class="rounded-lg w-full"/>
      </div>
    </div>
  </div>
</section>

<script>
  const targetDate = new Date("2025-11-30T23:59:59").getTime();

  const countdown = setInterval(() => {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance < 0) {
      clearInterval(countdown);
      document.getElementById("countdown").innerHTML =
        '<span class="text-2xl font-bold text-red-500">{{ __('messages.Time_Expired') }}</span>';
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerText = days.toString().padStart(2, '0');
    document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
    document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
    document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');
  }, 1000);
</script>

<div class="mb-[140px]"></div>

<!-- Produk Unggulan -->
<div class="text-center">
  <div class="text-4xl font-bold mb-20 text-blue-900">
    {{ __('messages.Home_FeaturedProducts') }}
  </div>
</div>

<!-- Produk -->
<div class="mt-12 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-12 justify-items-center">
  @foreach ([1, 13, 4, 6, 3] as $id)
    @php $product = \App\Models\Product::find($id); @endphp
    @if ($product)
      <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
        <a href="{{ url('product/' . $product->id) }}">
          <img
            src="{{ asset('img/' . $product->image) }}"
            alt="{{ $product->name }}"
            class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4"
          />
          <div class="p-3 text-center">
            <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
            <p class="mt-3 text-sm text-red-500 font-semibold">
              Rp.{{ number_format($product->price, 0, ',', '.') }}
            </p>
            <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
          </div>
        </a>
      </div>
    @endif
  @endforeach
</div>

<div class="mb-[360px]"></div>

@include("layout.footer")
