@include("layout.header")


@section('content')
<div class="bg-blue-900 py-12">
    <h1 class="text-4xl font-bold text-white text-center">Semua Produk Cat</h1>
    <p class="text-white text-center mt-2">Temukan cat berkualitas untuk semua kebutuhan proyek Anda</p>
</div>


<div class="mt-3 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-12 justify-items-center">

<<<<<<< HEAD
  <!-- ITEM 1 -->
<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="ftalit">
    <img src="/img/ftalit.png" alt="KANSAI FTALIT"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI FTALIT
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

 <!-- ITEM 2 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="ftalitduo">
    <img src="/img/ftalitduo.png" alt="KANSAI FTALIT DUO"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI FTALIT DUO
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  <!-- ITEM 3 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="splesh">
    <img src="/img/splesh.png" alt="KANSAI SPLESH"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI SPLESH
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>


  <!-- ITEM 4 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="spleshglimmer">
    <img src="/img/spleshglimmer.png" alt="KANSAI SPLESH GLIMMER"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI SPLESH GLIMMER
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  
  <!-- ITEM 5 --> 
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="diamondshield">
    <img src="/img/diamondshield.png" alt="KANSAI DIAMOND SHIELD"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI DIAMOND SHIELD
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
=======
  @forelse($products ?? collect() as $product)
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
        <a href="{{ url('ftalitduo/') }}">
            <img src="{{ $product->image_url ?? '/img/ftalitduo.png' }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
            <div class="p-3 text-center">
                <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
                <p class="mt-3 text-sm text-red-500 font-semibold">RP.{{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
            </div>
        </a>
>>>>>>> origin/main
    </div>
  @empty
    <div class="mt-44 col-span-full text-center text-gray-500">
      Tidak ada produk untuk ditampilkan.
    </div>
  @endforelse

</div>
<<<<<<< HEAD
<div class="mb-20"></div>

<div class="mt-3 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

  <!-- ITEM 1 -->
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="rainblock">
    <img src="/img/rainblock.png" alt="KANSAI RAIN BLOCK"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI RAIN BLOCK
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  <!-- ITEM 2 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="propertyeks">
    <img src="/img/propertyeks.png" alt="KANSAI RAIN BLOCK"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI PROPERTY EKSTERIOR
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  <!-- ITEM 3 -->
<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="propertyint">
    <img src="/img/propertyint.png" alt="KANSAI RAIN BLOCK"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI PROPERTY INTERIOR
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  <!-- ITEM 4 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="pearlsheen">
    <img src="/img/pearlsheen.png" alt="KANSAI PEARLSHEEEN"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI PEARLSHEEN
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>
  
  <!-- ITEM 5 --> 
<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="tropic">
    <img src="/img/tropic.png" alt="KANSAI FTALIT"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI TROPIC
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>
</div>
<div class="mb-20"></div>
=======
>>>>>>> origin/main

<div class="mt-3 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

<div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="antimosquito">
    <img src="/img/antimosquito.png" alt="KANSAI MOSQUITO"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI ANTIMOSQUITO
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.94,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>
</div>

  <div class="mb-96"></div>

  @include('layout.footer')
  
</body>
</html>

