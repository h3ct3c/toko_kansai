@include("layout.header")


@section('content')
<div class="bg-blue-900 py-12">
  <h1 class="text-4xl font-bold text-white text-center">Semua Produk Cat</h1>
  <p class="text-white text-center mt-2">Temukan cat berkualitas untuk semua kebutuhan proyek Anda</p>
</div>

<div class="mt-20 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

  @forelse($products ?? collect() as $product)
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
      <a href="{{ url('') }}">
        <img src="{{ asset('img/'.$product->image) }}" 
             alt="{{ $product->name }}" 
             class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
          <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
          <p class="mt-3 text-sm text-red-500 font-semibold">
            RP.{{ number_format($product->price, 0, ',', '.') }}
          </p>
          <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
      </a>
    </div>
  @empty
    <div class="mt-44 col-span-full text-center text-gray-500">
      Tidak ada produk untuk ditampilkan.
    </div>
  @endforelse

</div>

<div class="mb-[500px]"></div>

@include('layout.footer')


<div class="bg-blue-900 py-60">
    <h1 class="text-4xl font-bold text-white text-center">Semua Produk Cat</h1>
    <p class="text-white text-center mt-2">Temukan cat berkualitas untuk semua kebutuhan proyek Anda</p>
</div>

<div class="mb-32 h-full"></div>

  <!-- Kategori / Filter -->
      <div class="flex justify-center mb-10 ">
        <div id="categoryButtons" class="flex justify-center gap-4 flex-wrap">
          <button data-cat="all" class="category-btn px-5 py-2 rounded-full bg-blue-900 text-white font-semibold shadow">Semua</button>
          <button data-cat="interior" class="category-btn px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-700">Interior</button>
          <button data-cat="eksterior" class="category-btn px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-700">Eksterior</button>
          <button data-cat="premium" class="category-btn px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-700">Premium</button>
          <button data-cat="kayubesi" class="category-btn px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-700">Kayu & Besi</button>
        </div>
      </div>

      <!-- Grid Produk -->
      <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">


        <!-- Card 1 -->
      @include('card.spleshglimmer')
      @include('card.pearlsheen')
      @include('card.diamondshield')
      @include('card.antimosquito')
      @include('card.tropic')
      @include('card.propertyint')
      @include('card.propertyeks')
      @include('card.splesh')     
      @include('card.rainblock')
      @include('card.ftalit')
      @include('card.ftalitduo')
     

  <!-- Simple JS: kategori filter + active button styling -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const buttons = document.querySelectorAll('.category-btn');
      const cards = document.querySelectorAll('.product-card');

      function setActive(btn) {
        buttons.forEach(b => {
          b.classList.remove('bg-blue-900', 'text-white', 'shadow');
          b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
        });
        btn.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
        btn.classList.add('bg-blue-900', 'text-white', 'shadow');
      }

      buttons.forEach(btn => {
        btn.addEventListener('click', () => {
          const cat = btn.dataset.cat;
          setActive(btn);
          cards.forEach(card => {
            if (cat === 'all' || card.dataset.category === cat) {
              card.style.display = '';
            } else {
              card.style.display = 'none';
            }
          });
        });
      });

      // set default active first button
      if (buttons.length) setActive(buttons[0]);
    });
  </script>

  

  




    

</div>

  <div class="mb-96"></div>

  @include('layout.footer')
  

</body>
</html>
