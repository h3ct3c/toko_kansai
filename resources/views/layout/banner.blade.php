<!-- Tambah link Swiper CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Container -->
<div class="swiper mySwiper mt-16 max-w-7xl mx-auto h-48 sm:h-64 md:h-80 lg:h-96 rounded overflow-hidden shadow-lg">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="/img/kansai_19.jpg" class="w-full h-full object-cover" />
    </div>
    <div class="swiper-slide">
      <img src="/img/Web-side-banner-.png" class="w-full h-full object-cover" />
    </div>
    <div class="swiper-slide">
      <a href="/product_detail">
        <img src="/img/1.jpg.jpeg" class="w-full h-full object-cover" />
      </a>
    </div>
  </div>

  <!-- Pagination -->
  <div class="swiper-pagination"></div>
</div>

<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 4815,
      disableOnInteraction: false, // biar autoplay tetap jalan meski di-swipe
    },
    speed: 1000,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
