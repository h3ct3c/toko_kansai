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

  <!-- Navbar -->
  <nav class="w-full flex flex-wrap items-center justify-between px-4 py-3 shadow-sm sticky top-0 bg-white z-50">

    <!-- Logo -->
    <div class="flex items-center space-x-2 px-8">
      <img src="/img/logo kansai.jpg" class="h-16" alt="Kansai Paint Logo">
    </div>

    <!-- HomePage -->
    <ul class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm font-medium text-gray-700 mt-3 md:mt-0">
      <li>
        <a href="/" class="nav-link block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Home</a>
      </li>
      <li>
        <a href="/product" class="nav-link block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Product</a>
      </li>
      <li>
        <a href="/colors" class="nav-link block py-2 px-2 border-b-2 border-transparent hover:border-blue-900 hover:text-blue-900 transition-all">Colors</a>
      </li>
      <li>
  <a href="/login"
     class="nav-link block py-2 px-6 border-2 border-blue-400 rounded-lg text-blue-400 
            hover:border-blue-600 hover:text-blue-600 transition-all">
    Sign In
  </a>
</li>
<li>
  <a href="/register"
     class="bg-blue-500 text-white nav-link block py-2 px-6 border-2 rounded-lg 
            hover:border-blue-600 hover:text-gray-300 transition-all">
    Sign Up
  </a>
</li>
    
    </ul>

    <!-- Search + Cart + Dropdown -->
    <div class="flex flex-wrap items-center gap-4 mt-3 md:mt-0">

      <!-- Search -->
      <form action="{{ route('search') }}" method="GET" class="relative w-48 md:w-72">
        <input
          type="text"
          name="query"
          placeholder="Buruan Cari!"
          class="w-full rounded-lg border border-gray-300 py-2 pl-4 pr-10 text-sm 
                 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
          required
        />
        <button type="submit" aria-label="Search"
          class="absolute right-2 top-2.5 text-gray-400 hover:text-blue-400">
          <svg xmlns="http://www.w3.org/2000/svg"
               class="h-5 w-5"
               fill="none"
               viewBox="0 0 24 24"
               stroke="currentColor"
               stroke-width="2"
               aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 10-10.61-10.61 
                 7.5 7.5 0 0010.6 10.6z" />
          </svg>
        </button>
      </form>

      <!-- Cart -->
      <a href="/cart">
  <button aria-label="Shopping Cart"
    class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 flex items-center space-x-2 
           text-gray-600 hover:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" 
         width="28" height="28" viewBox="0 0 24 24" fill="none"
         class="stroke-current">
      <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" 
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>

  </button>
</a>

      <!-- Dropdown -->
      <div class="relative inline-block text-center">
        <!-- Tombol Dropdown -->
        <button id="dropdownButton" class="p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 hover:text-blue-400">
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
          class="absolute right-0 w-40 mt-1 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible transition duration-300">
          <div class="py-1">

            <!-- My Order -->
            <a href="/order history" 
               class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="w-5 h-5"
                   viewBox="0 0 1024 1024"
                   fill="currentColor">
                <path d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8 0 0.8-0.8 1.6-0.8 2.4v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z m25.6-48H944l-46.4-726.4H708v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8s-44.8-20-44.8-44.8c0-14.4 7.2-27.2 20-36h0.8v-57.6H363.2v57.6h0.8c12.8 8.8 20 21.6 20 36 0 24.8-20 44.8-44.8 44.8-24.8 0-44.8-20-44.8-44.8 0-14.4 7.2-27.2 20-36h0.8v-57.6H125.6l-46.4 726.4zM512 49.6c-81.6 0-148.8 66.4-148.8 148.8v3.2h298.4l-0.8-1.6v-1.6c0-82.4-67.2-148.8-148.8-148.8z"/>
              </svg>
              <span>My Order</span>
            </a>

            <!-- Settings -->
            <a href="/settings"
              class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="1.5">
               <circle cx="12" cy="12" r="3"/>
             <path d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"/>
           </svg>
          <span>Settings</span>
         </a>


            <!-- Logout -->
           <a href="/"
             class="flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-gray-100">
           <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round">
              <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17"/>
             <path d="M15 12L2 12M2 12L5.5 9M2 12L5.5 15"/>
            </svg>
           <span>Logout</span>
          </a>


          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- SCRIPT: Dropdown -->
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

  <!-- SCRIPT: Active menu highlight -->
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
