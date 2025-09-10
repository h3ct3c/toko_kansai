@include("layout.header")

@include("layout.banner")

<div class="mb-48"></div>
<div class="text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-blue-900">Browse Our Categories</h2>
    <p class="mt-2 text-2xl text-gray-500">Explore Your Paint</p>
</div>
<div class="mb-2"></div>

<!-- Bawah Banner -->
<section class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 px-6 lg:px-16 py-12">
    <!-- Card 1 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_12.jpg" alt="Shoes" class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Cat Premium</h2>
            <a href="/premium"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                Explore
            </a>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_5.jpg" alt="Apparel" class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Cat Eksterior</h2>
            <a href="/eksterior"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
                Explore
            </a>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_7.jpg" alt="Accessories" class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Cat Interior</h2>
            <a href="/interior"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                Explore
            </a>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="relative group overflow-hidden rounded-2xl shadow-lg">
        <img src="/img/kansai_6.jpg" alt="Apparel" class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-30"></div>
        <div class="absolute bottom-6 left-6 text-white">
            <h2 class="text-2xl font-bold">Cat Kayu & Besi</h2>
            <a href="/kayubesi"
               class="mt-3 inline-block bg-white text-black px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                Explore
            </a>
        </div>
    </div>
</section>

<div class="mb-32"></div>
<div class="text-center">
    <h2 class="text-3xl md:text-4xl font-bold font-display leading-tight text-blue-900">Best Selling Products</h2>
</div>
<div class="mb-16"></div>

<div class="mt-3 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

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
    <a href="ftalit">
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
    </div>
    </a>
  </div>
</div>
<div class="mb-96"></div> 

@extends('layout.footer')