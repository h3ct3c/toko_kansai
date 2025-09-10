@include('layout.header')

@include('layout.banner')



  <div>
  <h1 class="font-extrabold text-blue-900 text-center text-4xl mt-24">Kategori Produk</h1>
  <p class="text-center font-semibold mt-3">Pilih kategori cat sesuai kebutuhan proyek Anda</p>
  </div>

<section class="py">
  <div class="max-w-6xl mx-auto mt-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <!-- Cat Premium -->
    <a href="premium">
    <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
      <img fetchpriority="high" decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/banner.webp" class="attachment-large size-large wp-image-183" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/banner.webp 485w, https://kansaipaint.id/wp-content/uploads/2025/03/banner-300x300.webp 300w, https://kansaipaint.id/wp-content/uploads/2025/03/banner-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/banner-150x150.webp 150w" sizes="(max-width: 485px) 100vw, 485px">
      <p class="mt-4 font-bold text-gray-800 group-hover:text-blue-900">Cat Premium</p>
    </div>
    </a>

    <!-- Cat Eksterior -->
    <a href="eksterior">
    <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
      <img decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/home.webp" class="attachment-large size-large wp-image-184" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/home.webp 420w, https://kansaipaint.id/wp-content/uploads/2025/03/home-300x300.webp 300w, https://kansaipaint.id/wp-content/uploads/2025/03/home-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/home-150x150.webp 150w" sizes="(max-width: 420px) 100vw, 420px">
      <p class="mt-4 font-bold text-gray-800 group-hover:text-blue-900">Cat Eksterior</p>
    </div>
    </a>

    <!-- Cat Interior -->
    <a href="interior">
      <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
        <img decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/sofa.webp" class="attachment-large size-large wp-image-185" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/sofa.webp 425w, https://kansaipaint.id/wp-content/uploads/2025/03/sofa-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/sofa-300x296.webp 300w" sizes="(max-width: 425px) 100vw, 425px">
        <p class="mt-4 font-bold text-gray-800 group-hover:text-blue-900">Cat Interior</p>
      </div>
    </a>

    <!-- Cat Besi & Kayu -->
     <a href="kayubesi ">
    <div class="group p-6 bg-white rounded-2xl shadow hover:shadow-xl border border-gray-300 flex flex-col items-center transition">
      <img loading="lazy" decoding="async" width="100" height="100" src="https://kansaipaint.id/wp-content/uploads/2025/03/fence.webp" class="attachment-large size-large wp-image-186" alt="" srcset="https://kansaipaint.id/wp-content/uploads/2025/03/fence.webp 568w, https://kansaipaint.id/wp-content/uploads/2025/03/fence-300x300.webp 300w, https://kansaipaint.id/wp-content/uploads/2025/03/fence-100x100.webp 100w, https://kansaipaint.id/wp-content/uploads/2025/03/fence-150x150.webp 150w" sizes="(max-width: 568px) 100vw, 568px">
      <p class="mt-4 font-bold text-gray-800 group-hover:text-blue-900">Cat Besi & Kayu</p>
    </div>
    </a>
  </div>
</section>

  <div class="mb-20"></div>

  </div> 

<!-- Produk Unggulan -->
<section class="py-16 bg-white">
  <div class="container mx-auto px-6">
    <!-- Judul -->
    <div class="text-center mb-8">
      <h2 class="text-4xl font-extrabold text-blue-900">Produk Unggulan</h2>
      <p class="font-semibold mt-2 text-lg">Koleksi cat warna terbaik dengan kualitas premium dan harga terjangkau</p>
    </div>

    <!-- Filter kategori -->
    <div class="flex justify-center mb-10">
      <div id="categoryButtons" class="flex gap-3 flex-wrap">
        <button data-cat="all" class="category-btn px-5 py-2 rounded-full bg-blue-900 text-white font-bold shadow">Semua</button>
        <button data-cat="interior" class="font-semibold category-btn px-5 py-2 rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-blue-900 hover:text-white">Interior</button>
        <button data-cat="eksterior" class="font-semibold category-btn px-5 py-2 rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-blue-900 hover:text-white">Eksterior</button>
        <button data-cat="kayu" class="font-semibold category-btn px-5 py-2 rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-blue-900 hover:text-white">Kayu & Besi</button>
        <button data-cat="besi" class="font-semibold category-btn px-5 py-2 rounded-full bg-white border border-gray-300 text-gray-700 hover:bg-blue-900 hover:text-white">Premium</button>
      </div>
    </div>

    <!-- Grid produk -->
    <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card contoh 1 -->
      <div class="product-card relative bg-white rounded-xl shadow-sm overflow-hidden" data-category="interior">
        <!-- Badges -->
        <div class="absolute top-2 left-2">
          <span class="inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-medium">Terlaris</span>
        </div>
        <div class="absolute top-2 right-2">
          <span class="inline-block bg-red-500 text-white text-xs px-3 py-1 rounded-full font-medium">Sale</span>
        </div>

        
        <div class="h-64 flex items-center justify-center bg-gray-100">
            <img src="/img/antimosquito.png" alt="KANSAI ANTIMOSQUITO"
        class="w-[250px] h-[280px] padding-auto mb-auto object-cove group-hover:opacity-60 p-4" />
        </div>

        <!-- Info -->
        <div class="p-4 bg-gray-50">
          <h3 class="font-semibold text-lg text-gray-800">KANSAI ANTIMOSQUITO</h3>
          <p class="mt-1 text-sm text-gray-500 font-semibold">Cat interior anti nyamuk cuyyy</p>
          <div class="mt-4 flex items-center justify-between">
            <div class="text-lg font-bold text-gray-900">Rp 125.000</div>
            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Lihat</a>
          </div>
        </div>
      </div>

      <!-- Card contoh 2 -->
      <div class="product-card relative bg-white rounded-xl shadow-sm overflow-hidden" data-category="kayu">
        <div class="absolute top-2 left-2">
          <span class="inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-medium">Anti Karat</span>
        </div>

        <div class="h-64 flex items-center justify-center bg-gray-100">
            <img src="/img/ftalitduo.png" alt="KANSAI FTALIT DUO"
        class="w-[250px] h-[280px] padding-auto mb-auto object-cove group-hover:opacity-60 p-4" />
        </div>

          <div class="absolute top-2 right-2">
          <span class="inline-block bg-red-500 text-white text-xs px-3 py-1 rounded-full font-medium">Sale</span>
        </div>

        <div class="p-4 bg-gray-50">
          <h3 class="font-semibold text-lg text-gray-800">KANSAI FTALIT DUO</h3>
          <p class="mt-1 text-sm text-gray-500 font-semibold">Lindungi dan perindah permukaan kayu.</p>
          <div class="mt-4 flex items-center justify-between">
            <div class="text-lg font-bold text-gray-900">Rp 95.000</div>
            <a href="ftalitduo" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Lihat</a>
          </div>
        </div>
      </div>

      <!-- Card contoh 3 -->
      <div class="product-card relative bg-white rounded-xl shadow-sm overflow-hidden hover:opacity">
        <div class="absolute top-2 left-2">
          <span class="inline-block bg-yellow-500 text-white text-xs px-3 py-1 rounded-full font-medium">Premium</span>
        </div>
        <div class="absolute top-2 right-2">
          <span class="inline-block bg-red-500 text-white text-xs px-3 py-1 rounded-full font-medium">Sale</span>
        </div>

        <div class="h-64 flex items-center justify-center bg-gray-100">
          <img src="/img/diamondshield.png" alt="KANSAI DIAMOND SHIELD"
        class="w-[250px] h-[280px] padding-auto mb-auto object-cove group-hover:opacity-60 p-4" />
        </div>

        <div class="p-4 bg-gray-50">
          <h3 class="font-semibold text-lg text-gray-800">KANSAI DIAMOND SHIELD</h3>
          <p class="mt-1 text-sm text-gray-500 font-semibold">Perlindungan dinding eksterior yang mewah serta premium</p>
          <div class="mt-4 flex items-center justify-between">
            <div class="text-lg font-bold text-gray-900">Rp 302.000</div>
            <a href="diamondshield" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Lihat</a>
          </div>
        </div>
      </div>

      <!-- Tambahkan card lain sesuai kebutuhan, pastikan data-category sesuai -->
    </div>
  </div>
</section>

<!-- Script sederhana untuk filter (bisa ditempatkan di bawah sebelum </body>) -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.category-btn');
    const cards = document.querySelectorAll('.product-card');

    function setActiveBtn(activeBtn) {
      buttons.forEach(btn => {
        if (btn === activeBtn) {
          btn.classList.remove('bg-white', 'text-gray-700', 'border', 'hover:text-white');
          btn.classList.add('bg-blue-900', 'text-white', 'shadow', 'hover:bg-blue-900', 'hover:text-white',);
        } else {
          btn.classList.remove('bg-blue-600', 'text-white', 'shadow',);
          btn.classList.add('bg-white', 'text-gray-700', 'border',);
        }
      });
    }

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        const cat = btn.getAttribute('data-cat'); // all, interior, eksterior, kayu, besi, dekoratif
        setActiveBtn(btn);

        cards.forEach(card => {
          if (cat === 'all') {
            card.style.display = '';
          } else {
            const c = card.getAttribute('data-category');
            card.style.display = (c === cat) ? '' : 'none';
          }
        });
      });
    });
  });
</script>


  
<div class="mb-32"></div>
        
  <div class="border-t border-gray-400 w-11/12 mx-auto"></div>

<div class="mb-96"></div>

@extends('layout.footer')

</body>
</html>

