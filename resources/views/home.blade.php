@include('layout.header')

@include('layout.banner')

  <div class="font-semibold text-center text-4xl mt-24">
  <h1 class="text-blue-900">Browse By Category</h1>
  </div>

<section class="py-20">
  <div class="max-w-6xl mx-auto mt-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <!-- Cat Premium -->
    <a href="premium">
    <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
      <img fetchpriority="high" decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/banner.webp" class="attachment-large size-large wp-image-183" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/banner.webp 485w, https://kansaipaint.id/wp-content/uploads/2025/03/banner-300x300.webp 300w, https://kansaipaint.id/wp-content/uploads/2025/03/banner-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/banner-150x150.webp 150w" sizes="(max-width: 485px) 100vw, 485px">
      <p class="mt-4 font-semibold text-gray-800 group-hover:text-blue-500">Cat Premium</p>
    </div>
    </a>

    <!-- Cat Eksterior -->
    <a href="eksterior">
    <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
      <img decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/home.webp" class="attachment-large size-large wp-image-184" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/home.webp 420w, https://kansaipaint.id/wp-content/uploads/2025/03/home-300x300.webp 300w, https://kansaipaint.id/wp-content/uploads/2025/03/home-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/home-150x150.webp 150w" sizes="(max-width: 420px) 100vw, 420px">
      <p class="mt-4 font-semibold text-gray-800 group-hover:text-blue-500">Cat Eksterior</p>
    </div>
    </a>

    <!-- Cat Interior -->
    <a href="interior">
      <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
        <img decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/sofa.webp" class="attachment-large size-large wp-image-185" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/sofa.webp 425w, https://kansaipaint.id/wp-content/uploads/2025/03/sofa-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/sofa-300x296.webp 300w" sizes="(max-width: 425px) 100vw, 425px">
        <p class="mt-4 font-semibold text-gray-800 group-hover:text-blue-500">Cat Interior</p>
      </div>
    </a>

    <!-- Cat Besi & Kayu -->
     <a href="kayubesi ">
    <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
      <img loading="lazy" decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/fence.webp" class="attachment-large size-large wp-image-186" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/fence.webp 568w, https://kansaipaint.id/wp-content/uploads/2025/03/fence-300x300.webp 300w, https://kansaipaint.id/wp-content/uploads/2025/03/fence-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/fence-150x150.webp 150w" sizes="(max-width: 568px) 100vw, 568px">
      <p class="mt-4 font-semibold text-gray-800 group-hover:text-blue-500">Cat Besi & Kayu</p>
    </div>
    </a>
  </div>
</section>

  <div class="mb-28"></div>
  <div class="border-t border-gray-400 w-11/12 mx-auto">
  </div>
  <div class="mt-16 font-semibold justify-items-center text-blue-900 text-center"><h1 class="text-4xl">Best Selling Products</h1>
</div>
  
  <div class="mb-20"></div>

  <div class="mt-3 max-w-full grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
      gap-x-2 gap-y-12 justify-items-center">

  <!-- ITEM 1 --> 
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

<!-- ITEM 2 -->
  <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
    <a href="spleshglimmer">
    <img src="/img/spleshglimmer.png" alt="KANSAI SPLESH GLIMMER"
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
    <img src="/img/splesh.png" alt="KANSAI SPLESH"
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
    <img src="/img/diamondshield.png" alt="KANSAI DIAMOND SHIELD"
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
    <a href="ftalitduo">
    <img src="/img/rainblock.png" alt="KANSAI RAIN BLOCK"
        class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
    <div class="p-3 text-center">
      <h3 class="text-sm text-gray-700 font-semibold">
        KANSAI RAIN BLOCK
      </h3>
      <p class="mt-3 text-sm text-red-500 font-semibold">RP.100,000</p>
      <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
    </div>
    </a>
  </div>
  </div>

<div class="mb-24"></div>
        
  <div class="border-t border-gray-400 w-11/12 mx-auto"></div>

<div class="mb-96"></div>

@extends('layout.footer')

</body>
</html>

