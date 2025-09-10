@include("layout.header")

@include("layout.banner")

<div class="mb-44"></div>
<div class="text-center">
    <h2 class="text-3xl md:text-4xl font-bold font-display leading-tight text-blue-900">Color Collection</h2>
</div><div class="mb-24"></div>

<!-- Grid Warna -->
<div class="p-4 bg-[#f1f2f6] rounded-md">
  <div class="grid grid-cols-5 lg:grid-cols-7 gap-4">

    <!-- Item Warna -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
           style="background-color: rgb(181, 172, 150);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Neutral</p>
      </div>
    </div>

    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
           style="background-color: rgb(237, 32, 36);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Red</p>
      </div>
    </div>

    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
           style="background-color: rgb(250, 164, 26);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Orange</p>
      </div>
    </div>

    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
           style="background-color: rgb(246, 235, 20);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Yellow</p>
      </div>
    </div>

    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
           style="background-color: rgb(11, 129, 64);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Green</p>
      </div>
    </div>

    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
           style="background-color: rgb(57, 83, 164);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Blue</p>
      </div>
    </div>

    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer">
      <div class="h-[50px] md:h-[95px] rounded-md md:rounded-t md:rounded-b-none"
          style="background-color: rgb(124, 39, 125);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Purple</p>
      </div>
    </div>
  </div>
</div>

<div class="mb-96"></div>

@include('layout.footer')

</body>
</html>

 