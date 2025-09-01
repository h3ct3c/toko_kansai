@include('layout.header')

@include('layout.banner')


  <div class="font-semibold text-center text-4xl mt-20">
  <h1 class="text-blue-900">Browse By Category</h1>
  </div>

<section class="py-20">
  <div class="max-w-6xl mx-auto mt-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-6">
  <!-- Cat Besi & Kayu -->
   <a href="/cat_kayu_besi">
  <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
    <p class="font-semibold text-gray-800 group-hover:text-blue-500">Cat Besi & Kayu</p>
  </div>
  </a>

  <!-- Cat Eksterior -->
  <a href="/cat_eksterior">
  <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
    <p class="font-semibold text-gray-800 group-hover:text-blue-500">Cat Eksterior</p>
  </div>
  </a>

  <!-- Cat Premium -->
  <a href="/cat_premium">
  <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
    <p class="font-semibold text-gray-800 group-hover:text-blue-500">Cat Premium</p>
  </div>
  </a>

  <!-- Cat Interior -->
  <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
    <a href="/cat_interior">
    <p class="font-semibold text-gray-800 group-hover:text-blue-500">Cat Interior</p>
  </div>
  </a>
</div>
</section>

  <div class="mb-20"></div>
  <div class="border-t border-gray-400 w-11/12 mx-auto">
  </div>
  <div class="mt-8 font-semibold justify-items-center text-blue-900 text-center"><h1 class="text-4xl">Best Selling Products</h1>
</div>
  
  <div class="mb-20"></div>

  <div class="mt-3 max-w-full grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
      gap-x-2 gap-y-12 justify-items-center">

  <!-- ITEM 1 --> 
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="/product_detail">
    <img src="/img/KANSAI FTALIT DUO.png" alt="KANSAI FTALIT DUO"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI FTALIT DUO
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.100,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

<!-- ITEM 2 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="/cart">
    <img src="/img/KANSAI GLIMMER.png" alt="KANSAI SPLESH GLIMMER"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI SPLESH GLIMMER
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.100,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  <!-- ITEM 3 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="#">
    <img src="/img/SPLESH Kaleng Plastik 2,5 L - Copy.png" alt="KANSAI SPLESH"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI SPLESH
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.100,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐</p>
    </div>
    </a>
  </div>

  <!-- ITEM 4 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="/">
    <img src="/img/Kansai-Diamond-Shield.png" alt="KANSAI DIAMOND SHIELD"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI DIAMOND SHIELD 12-IN-1
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.100,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>

  
  <!-- ITEM 5 --> 
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="/product_detail">
    <img src="/img/KANSAI FTALIT DUO.png" alt="KANSAI FTALIT DUO"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI FTALIT DUO
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.100,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>
  </div>

<div class="mb-32"></div>

<button class="my-10 bg-blue-900 px-5 py-2 rounded-full text-white font-semibold font-serif block mx-auto hover:bg-sky-700
active:bg-blue-900 focus:ring-sky-300 animate-bounce">
  <span class="sr-only">View All Products</span>
<a href="/product">
    <span aria-hidden="true" class="absolute inset-0"></span>
    View All Products
  </a>
</button>
        
<div class="mb-28"></div> 

  <div class="border-t border-gray-400 w-11/12 mx-auto"></div>

<div class="mb-96"></div>

@include('layout.footer')

</body>
</html>

