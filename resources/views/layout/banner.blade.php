<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<section class="relative w-full min-h-[70vh] flex flex-col justify-end text-center px-6 lg:px-16 py-16 md:py-32">
    <!-- Swiper Container -->
    <div class="absolute inset-0">
        <div class="swiper h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/kansai_3.jpg');"></div>
                <!-- Slide 2 -->
                <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/kansai_19.jpg');"></div>
                <!-- Slide 3 -->
                <div class="swiper-slide bg-cover bg-center" style="background-image: url('/img/kansai_16.jpg');"></div>
            </div>
            <!-- Optional Pagination/Navigation -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
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
