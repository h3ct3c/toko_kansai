<<<<<<< HEAD
<!-- Tambah link Swiper CSS & JS -->

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Container -->
<section class="">
<div class="swiper mySwiper mt-16 max-w-6xl mx-auto h-48 sm:h-64 md:h-80 lg:h-96 rounded-lg overflow-hidden shadow-lg">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <img src="/img/kansai_19.jpg" class="w-full h-full object-cover" />
    </div>
    <div class="swiper-slide">
      <img src="/img/Web-side-banner-.png" class="w-full h-full object-cover" />
    </div>
    <div class="swiper-slide">
      <a href="ftalitduo">
        <img src="/img/1.jpg.jpeg" class="w-full h-full object-cover" />
      </a>
    </div>
  </div>

  <!-- Pagination -->
  <div class="swiper-pagination"></div>
</div>
=======
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
>>>>>>> origin/main
</section>

<script>
  const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: {
      delay: 4085,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
    },
  });
</script>
