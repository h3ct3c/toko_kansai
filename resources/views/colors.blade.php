@include("layout.header")

<div class="bg-gradient-to-br from-blue-900 to-blue-800 shadow-md hover:shadow-lg justify-items-center py-12">
  <h1 class="text-4xl font-bold text-white text-center">Seluruh koleksi Warna</h1>
  <p class="text-white text-center mt-4">Temukan Warna favorit Anda!  </p>
</div>

<div class="mb-24"></div>

<div class="p-4 bg-[#f1f2f6] rounded-md">
  <!-- Grid kategori utama -->
  <div class="grid grid-cols-5 lg:grid-cols-7 gap-4 ">

    <!-- Neutral -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('neutralRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(181, 172, 150);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Neutral</p>
      </div>
    </div>

    <!-- Red -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('redRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(237, 32, 36);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Red</p>
      </div>
    </div>

    <!-- Orange -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('orangeRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(250, 164, 26);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Orange</p>
      </div>
    </div>

    <!-- Yellow -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('yellowRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(246, 235, 20);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Yellow</p>
      </div>
    </div>

    <!-- Green -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('greenRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(11, 129, 64);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Green</p>
      </div>
    </div>

    <!-- Blue -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('blueRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(57, 83, 164);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Blue</p>
      </div>
    </div>

    <!-- Purple -->
    <div class="bg-white shadow rounded-md border hover:border-navy cursor-pointer hover:shadow-lg transition transform hover:scale-105"
         onclick="toggleRow('purpleRow')">
      <div class="h-[50px] md:h-[95px] rounded-md"
        style="background-color: rgb(124, 39, 125);"></div>
      <div class="p-3 hidden md:block">
        <p class="text-sm">Purple</p>
      </div>
    </div>
  </div>

  <!-- Grid turunan warna (row 2), default hidden -->
  <div id="redRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#ff4d4d] h-[50px] md:h-[95px] rounded-md">    </div>
  </div>

  <div id="neutralRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#d9d9d9] h-[50px] md:h-[95px] rounded-md"></div>  
  </div>

  <div id="orangeRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#ffa500] h-[50px] md:h-[95px] rounded-md"></div>
  </div>

  <!-- tambahin row lain sesuai kategori -->
   <div id="yellowRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#ddff01] h-[50px] md:h-[95px] rounded-md"></div>
  </div>

  <div id="greenRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#b2ff59] h-[50px] md:h-[95px] rounded-md"></div>
  </div>

  <div id="blueRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#1394fe] h-[50px] md:h-[95px] rounded-md"></div>
  </div>

  <div id="purpleRow" class="grid grid-cols-5 lg:grid-cols-7 gap-4 mt-4 hidden">
    <div class="bg-[#431de9] h-[50px] md:h-[95px] rounded-md"></div>
  </div>
</div>

<div class="mb-[500px]"></div>
@include('layout.footer')

<script>
  function toggleRow(id) {
    // sembunyiin semua row turunan
    document.querySelectorAll('[id$="Row"]').forEach(el => el.classList.add("hidden"));

    // tampilkan row yang diklik
    const row = document.getElementById(id);
    row.classList.remove("hidden");

    // animasi item muncul satu per satu
    const items = row.children;
    [...items].forEach((item, i) => {
      item.style.opacity = 0;
      setTimeout(() => {
        item.style.transition = "opacity 0,3s ease";
        item.style.opacity = 1;
      }, i * 50);
    });
  }
</script>
