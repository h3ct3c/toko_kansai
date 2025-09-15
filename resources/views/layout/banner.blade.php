<!-- Tambah link Swiper CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Container -->
<div class="swiper mySwiper mt-16 max-w-[1430px] mx-auto h-[450px] rounded-xl shadow-lg overflow-hidden">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="/img/kansai_19.jpg" class="w-full h-full object-cover" />
    </div>
    <div class="swiper-slide">
      <img src="/img/kansai_16.jpg" class="w-full h-full object-cover" />
    </div>
    <div class="swiper-slide">
      <img src="/img/kansai_3.jpg" class="w-full h-full object-cover" />
    </div>
  </div>
  <!-- Navigasi -->
  <div class="swiper-pagination"></div>
</div>

<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
