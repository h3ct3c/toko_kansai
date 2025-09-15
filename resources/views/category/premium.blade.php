@include("layout.header")

<div class="mb-16"></div>

<div class="mt-3 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

  <!-- ITEM 1 -->
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

 <!-- ITEM 2 -->
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

</div>  

<div class="mb-96"></div>
@include('layout.footer')


