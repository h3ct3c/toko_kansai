<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kansai Store.com</title>
  <link rel="website icon" type="image/png" href="img/Logo_KansaiK.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-white font-sans text-gray-700">

  <!-- Topbar -->
  <div class="bg-gray-100 text-gray-900 text-[13px] font-bold">
    <div class="max-w-[1410px] mx-auto flex justify-end py-1">
      <div class="flex space-x-8">
        <a href="/diskon" class="hover:text-blue-600">Diskon</a>
        <a href="/https://kansaipaint.id/hubungi-kami" class="hover:text-blue-600">Contact</a>

        @guest
          <a href="/register" class="hover:text-blue-600">Join us</a>
          <a href="/login" class="hover:text-blue-600">Sign In</a>
        @endguest
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="w-full flex items-center justify-between px-8 py-2 shadow-sm sticky top-0 bg-white z-50">

    <!-- Kiri: Logo + Menu -->
    <div class="flex items-center space-x-6">
      <a href="/" class="flex items-center space-x-1 px-5">
        <img src="/img/logo.png" class="h-[53px]" alt="Kansai Paint Logo">
      </a>

      <ul class="flex gap-x-6 text-sm font-medium text-gray-700">
        <li>
          <a href="/" class="nav-link block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Home</a>
        </li>

        <!-- Dropdown Product -->
        <li class="relative group">
          <a href="/product" class="nav-link block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Product</a>

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

              <!-- Kolom 4 -->
              <div class="relative text-[15px]">
                <img src="https://via.placeholder.com/200x120" alt="Promo" class="rounded-md object-cover">
                <p class="mt-2 text-sm text-gray-500">Promo spesial untuk cat premium</p>
              </div>
            </div>
          </div>
        </li>

        <li>
          <a href="/colors" class="nav-link block py-2 px-1 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Colors</a>
        </li>
      </ul>
    </div>

    <!-- Kanan: Search + Cart + User -->
    <div class="flex items-center gap-4">

      <!-- Search -->
      <form action="{{ route('search') }}" method="GET" class="relative group transition-all duration-1000 ease-in-out w-[180px] focus-within:w-[870px]">
        <input type="text" name="query" placeholder="What the helly" 
          class="w-full rounded-full bg-gray-100 py-[10px] pl-12 pr-10 text-sm focus:outline-none text-gray-600 hover:bg-gray-200 placeholder-gray-400 transition-all duration-1000 ease-in-out"
          required />
        <button type="submit" aria-label="Search"
          class="absolute left-4 top-1/2 -translate-y-1/2 text-black hover:text-blue-700 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 10-10.61-10.61 7.5 7.5 0 0010.6 10.6z"/>
          </svg>
        </button>
      </form>

      <!-- Cart -->
      <a href="/cart" aria-label="Shopping Cart"
        class="p-2 rounded-full flex items-center text-blue-900 hover:text-blue-900 hover:bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" class="stroke-current">
          <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.5523 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>        

      <!-- User Dropdown -->
      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="p-2 rounded-full focus:outline-none focus:ring-2 text-blue-900 focus:ring-blue-900 hover:text-blue-900 hover:bg-gray-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 16 16" fill="currentColor">
            <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"/>
            <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"/>
          </svg>
        </button>

        <div x-show="open" @click.outside="open = false" x-transition
          class="absolute right-0 mt-2 w-[200px] bg-white border shadow-lg rounded p-3 z-50">

          <ul class="text-sm text-gray-700 divide-y">
            <li>
              <a href="{{ route('profile.show') }}" class="block py-2 hover:bg-gray-100">My Account</a>
            </li>
            <li>
              <a href="{{ route('order.show') }}" class="block py-2 hover:bg-gray-100 flex items-center gap-2">
                <svg width="20px" height="20px" viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8 0 0.8-0.8 1.6-0.8 2.4v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z m25.6-48H944l-46.4-726.4H708v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8s-44.8-20-44.8-44.8c0-14.4 7.2-27.2 20-36h0.8v-57.6H363.2v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8-24.8 0-44.8-20-44.8-44.8 0-14.4 7.2-27.2 20-36h0.8v-57.6H125.6l-46.4 726.4zM512 49.6c-81.6 0-148.8 66.4-148.8 148.8v3.2h298.4l-0.8-1.6v-1.6c0-82.4-67.2-148.8-148.8-148.8z" fill=""></path></g></svg>
                Orders
              </a>
            </li>

            @auth
            <li>
              <form method="POST" action="{{ route('logout') }}" class="block py-2 hover:bg-gray-100">
                @csrf
                <button type="submit" class="text-red-500 flex items-center gap-2">
                  <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                    <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17" stroke="#ff0000" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15" stroke="#ff0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                  Logout
                </button>
              </form>
            </li>
            @endauth  
          </ul>
        </div>
      </div>

    </div>
  </nav>

  <!-- Active Menu Highlight -->
  <script>
    const currentPath = window.location.pathname;
    document.querySelectorAll(".nav-link").forEach(link => {
      if (link.getAttribute("href") === currentPath) {
        link.classList.add("text-blue-900", "border-blue-900");
      }
    });
  </script>

</body>
</html>
