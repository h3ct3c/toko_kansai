
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


<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<section class="relative w-full min-h-[80vh] flex flex-col justify-end text-center px-6 lg:px-16 py-16 md:py-32">
    <!-- Swiper Container -->
    <div class="absolute inset-0">
        <div class="swiper h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/kansai_19.jpg');"></div>
                <!-- Slide 2 -->
                <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/kansai_19.jpg');"></div>
                <!-- Slide 3 -->
                <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/kansai_19.jpg');"></div>
            </div>
            <!-- Optional Pagination/Navigation -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>


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
