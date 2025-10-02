@include("layout.header")

@section('content')

<div class="bg-gradient-to-br from-blue-900 to-blue-800 shadow-md hover:shadow-lg shadow- transition transform hover:scale-105 justify-items-cente py-12">
  <h1 class="text-4xl font-bold text-white text-center">Semua Produk Cat</h1>
  <p class="text-white text-center mt-4">Temukan cat berkualitas untuk semua kebutuhan proyek Anda  </p>
</div>

<div class="mt-20"></div>

<!-- Produk -->
<div class="mt-12 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-12 justify-items-center">

  <!-- item 1 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="ftalitduo">
      <img src="/img/ftalitduo.png" alt="KANSAI DIAMOND SHIELD"
      class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
      <div class="p-3 text-center">
        <h3 class="text-sm text-gray-700 font-semibold">KANSAI FTALITDUO</h3>
        <p class="mt-3 text-sm text-red-500 font-semibold">RP.92,000</p>
        <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
      </div>
    </a>
  </div>
  
  <!-- item 2 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="propertyglozz">
      <img src="/img/propertyglozz.png" alt="KANSAI PROPERTYGLOZZ"
           class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
      <div class="p-3 text-center">
        <h3 class="text-sm text-gray-700 font-semibold">KANSAI PROPERTYGLOZZ</h3>
        <p class="mt-3 text-sm text-red-500 font-semibold">RP.69,375</p>
        <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
      </div>
    </a>
  </div>

  <!-- item 3 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="propertyint">
      <img src="/img/propertyint.png" alt="KANSAI PROPERTYINT"
           class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
      <div class="p-3 text-center">
        <h3 class="text-sm text-gray-700 font-semibold">KANSAI PROPERTYINT</h3>
        <p class="mt-3 text-sm text-red-500 font-semibold">RP.174,825</p>
        <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
      </div>
    </a>
  </div>

  <!-- item 4 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="rainblock">
      <img src="/img/rainblock.png" alt="KANSAI DIAMOND SHIELD"
           class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
      <div class="p-3 text-center">
        <h3 class="text-sm text-gray-700 font-semibold">KANSAI RAINBLOCK</h3>
        <p class="mt-3 text-sm text-red-500 font-semibold">RP.235,320</p>
        <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
      </div>
    </a>
  </div>

  <!-- item 5 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="tropic">
      <img src="/img/tropic.png" alt="KANSAI TROPIC"
      class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
      <div class="p-3 text-center">
        <h3 class="text-sm text-gray-700 font-semibold">KANSAI TROPIC</h3>
        <p class="mt-3 text-sm text-red-500 font-semibold">RP.126,540</p>
        <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
      </div>
    </a>
  </div>
</div>

<div class="mb-[500px]"></div>

@include('layout.footer')
</body>
</html>
