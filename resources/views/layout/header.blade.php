<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kansai Paint</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      height: 6px;
      width: 6px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: rgba(100, 116, 139, 0.5);
      border-radius: 3px;
    }
  </style>
</head>
<body class="bg-white font-sans text-gray-700">

  <!-- Topbar -->
<div class="bg-gray-100 text-gray-600 text-[14px] font-normal">
  <div class="max-w-[1430px] mx-auto flex justify-end py-1">
    <div class="flex space-x-10">
      <a href="/tentangkami" class="hover:text-blue-600">Tentang Kami</a>
      <a href="/diskon" class="hover:text-blue-600">Diskon</a>
      <a href="/help" class="hover:text-blue-600">Help</a>
      <a href="/login" class="hover:text-blue-600">Sign In</a>
    </div>
  </div>
</div>

  <!-- Navbar -->
  <nav class="w-full flex flex-wrap items-center justify-between px-8 py-2 shadow-sm sticky top-0 bg-white z-50">

    <!-- Logo -->
    <a href="/" class="flex items-center space-x-1 px-5">
      <img src="/img/logo.png" class="h-[53px]" alt="Kansai Paint Logo">
    </a>

    <!-- Menu -->
    <ul class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm font-medium text-gray-700 mt-3 md:mt-0">

    <li class="relative group">
        <a href="/" class="block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Home</a>

      <li class="relative group">
        <a href="/product" class="block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Product</a>

        <!-- Dropdown Product -->
        <div class="fixed left-0 hidden group-hover:flex bg-white shadow-lg rounded-lg mt-2 w-full p-8">
          <div class="grid grid-cols-4 gap-2 max-w-4xl mx-auto">
            
            <!-- Kolom 1 -->
            <div>
              <h3 class="font-bold text-blue-900 text-[15px] mb-2">Kategori Utama</h3>
              <ul class="space-y-2">
                <li><a href="/interior" class="block text-gray-600 hover:text-blue-700">Interior</a></li>
                <li><a href="/eksterior" class="block text-gray-600 hover:text-blue-700">Eksterior</a></li>
                <li><a href="/kayubesi" class="block text-gray-600 hover:text-blue-700">Kayu & Besi</a></li>
                <li><a href="/premium" class="block text-gray-600 hover:text-blue-700">Premium</a></li>
              </ul>
            </div>

            <!-- Kolom 2 -->
            <div>
              <h3 class="font-bold text-blue-900 text-[15px] mb-2">Finishing</h3>
              <ul class="space-y-2">
                <li><a href="/gloss" class="block text-gray-600 hover:text-blue-700">Gloss</a></li>
                <li><a href="/matt" class="block text-gray-600 hover:text-blue-700">Matt</a></li>
                <li><a href="/sheen" class="block text-gray-600 hover:text-blue-700">Sheen</a></li>
              </ul>
            </div>

            <!-- Kolom 3 -->
            <div>
              <h3 class="font-bold text-blue-900 text-[15px] mb-2">Koleksi Favorit</h3>
              <ul class="space-y-2">
                <li><a href="#" class="block text-gray-600 hover:text-blue-700">Best Seller</a></li>
                <li><a href="#" class="block text-gray-600 hover:text-blue-700">Limited Edition</a></li>
              </ul>
            </div>

            <!-- Kolom 4 (gambar/teaser) -->
            <div class="relative text-[15px]">
              <img src="https://via.placeholder.com/200x120" alt="Promo" class="rounded-md object-cover">
              <p class="mt-2 text-sm text-gray-500">Promo spesial untuk cat premium</p>
            </div>
          </div>
        </div>
      </li>

      <li>
        <a href="/colors" class="block py-2 px-1 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Colors</a>
      </li>
    </ul>

    <!-- Search + Cart + User -->
    <div class="flex flex-wrap items-center gap-[20px] mt-3 md:mt-0">

      <!-- Search -->
<form action="{{ route('search') }}" method="GET" class="relative w-48 md:w-[220px]">
  <input
    type="text"
    name="query"
    placeholder="What the hell?"
    class="w-full rounded-full bg-gray-100 py-[10px] pl-12 pr-10 text-sm
           focus:outline-none text-gray-600 hover:bg-gray-200 placeholder-gray-400"
    required/>

  <!-- Tombol Search di kiri -->
  <button type="submit" aria-label="Search"
    class="absolute left-4 top-1/2 -translate-y-1/2 text-black hover:text-blue-700 rounded-md">
    <svg xmlns="http://www.w3.org/2000/svg"
        class="h-5 w-5"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 10-10.61-10.61 
           7.5 7.5 0 0010.6 10.6z" />
    </svg>
  </button>
</form>

      <!-- Cart -->
      <a href="/cart" aria-label="Shopping Cart"
        class="p-2 rounded-full focus:outline-none flex items-center space-x-2 
               text-blue-900 hover:text-blue-900 hover:bg-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" 
             width="28" height="28" viewBox="0 0 24 24" fill="none"
             class="stroke-current">
          <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.5523 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" 
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>

      <!-- User Dropdown -->
      <div class="relative inline-block text-center">
        <button id="dropdownButton"
          class="p-2 rounded-full focus:outline-none focus:ring-2 text-blue-900 
                 focus:ring-blue-900 hover:text-blue-900 hover:bg-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6"
              viewBox="0 0 16 16"
              fill="currentColor">
            <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"/>
            <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"/>
          </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownMenu"
          class="absolute right-0 w-40 mt-3 origin-top-right bg-white divide-y divide-gray-100 
                 rounded-md shadow-lg opacity-0 invisible transition duration-300">
          <div class="py-1">
            <a href="/order history" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" viewBox="0 0 1024 1024" fill="currentColor">
        <path d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z"/>
      </svg>  
            Orders</a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 1024 1024" fill="currentColor">
        <path d="M600.704 64a32 32 0 0 1 30.464 22.208l35.2 109.376c14.784 7.232 28.928 15.36 42.432 24.512l112.384-24.192a32 32 0 0 1 34.432 15.36L944.32 364.8a32 32 0 0 1-4.032 37.504l-77.12 85.12a357.12 357.12 0 0 1 0 49.024l77.12 85.248a32 32 0 0 1 4.032 37.504l-88.704 153.6a32 32 0 0 1-34.432 15.296L708.8 803.904c-13.44 9.088-27.648 17.28-42.368 24.512l-35.264 109.376A32 32 0 0 1 600.704 960H423.296a32 32 0 0 1-30.464-22.208L357.696 828.48a351.616 351.616 0 0 1-42.56-24.64l-112.32 24.256a32 32 0 0 1-34.432-15.36L79.68 659.2a32 32 0 0 1 4.032-37.504l77.12-85.248a357.12 357.12 0 0 1 0-48.896l-77.12-85.248A32 32 0 0 1 79.68 364.8l88.704-153.6a32 32 0 0 1 34.432-15.296l112.32 24.256c13.568-9.152 27.776-17.408 42.56-24.64l35.2-109.312A32 32 0 0 1 423.232 64H600.64zM512 320a192 192 0 1 1 0 384 192 192 0 0 1 0-384z"/>
      </svg>  
            My Account</a>
            <a href="/" class="flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M9 7V5c0-1.1.9-2 2-2h5c2.2 0 4 1.8 4 4v10c0 2.2-1.8 4-4 4h-5c-1.1 0-2-.9-2-2v-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M15 12H2m0 0 3.5-3M2 12l3.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round""/>
      </svg>  
            Logout</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Dropdown Script -->
  <script>
    const button = document.getElementById('dropdownButton');
    const menu = document.getElementById('dropdownMenu');

    button.addEventListener('click', () => {
      menu.classList.toggle('opacity-0');
      menu.classList.toggle('invisible');
    });

    document.addEventListener('click', (e) => {
      if (!button.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('opacity-0', 'invisible');
      }
    });
  </script>

  <!-- Active Menu Highlight -->
  <script>
    const currentPath = window.location.pathname;
    document.querySelectorAll(".nav-link").forEach(link => {
      if (link.getAttribute("href") === currentPath) {
        link.classList.add("text-blue-400", "border-blue-400");
      }
    });
  </script>

</body>
</html>
