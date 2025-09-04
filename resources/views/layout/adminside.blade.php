<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
     <!-- Sidebar -->
<aside class="w-64 bg-blue-900 text-white min-h-screen flex flex-col">
  <div class="p-4 font-bold text-lg flex items-center">
    <span class="ml-1 mt-4"></span>
  </div>

  <nav class="flex-1 space-y-2">
    <!-- Dashboard -->
    <a href="/dashboard" class="nav-link block py-3 px-6 hover:text-blue-600 rounded-lg flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="currentColor">
        <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"/>
        <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"/>
      </svg>
      <span class="text-sm font-medium">Dashboard</span>
    </a>

    <!-- Product -->
    <a href="/product_crud" class="nav-link block py-6 px-6 hover:text-blue-600 rounded-lg flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <polygon points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"/>
        <line x1="2" y1="7" x2="12" y2="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
        <line x1="12" y1="22" x2="12" y2="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
        <line x1="22" y1="7" x2="12" y2="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
        <line x1="17" y1="4.5" x2="7" y2="9.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
      </svg>
      <span class="text-sm font-medium">Products</span>
    </a>

    <!-- Orders -->
    <a href="" class="nav-link block py-6 px-6 hover:text-blue-600 rounded-lg flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024" fill="currentColor">
        <path d="M53.6 1023.2c-6.4 0-12.8-2.4-17.6-8-4.8-4.8-7.2-11.2-6.4-18.4L80 222.4c0.8-12.8 11.2-22.4 24-22.4h211.2v-3.2c0-52.8 20.8-101.6 57.6-139.2C410.4 21.6 459.2 0.8 512 0.8c108 0 196.8 88 196.8 196.8v0.8H920c12.8 0 23.2 9.6 24 22.4l49.6 768.8c0.8 2.4 0.8 4 0.8 6.4-0.8 13.6-11.2 24.8-24.8 24.8H53.6z"/>
      </svg>
      <span class="text-sm font-medium">Orders</span>
    </a>

    <!-- Analytics -->
    <a href="" class="nav-link block py-6 px-6 hover:text-blue-600 rounded-lg flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" fill="currentColor">
        <rect height="10" width="6" x="17" y="17" rx="1"/>
        <rect height="16" width="6" x="25" y="11" rx="1"/>
        <rect height="12" width="6" x="9" y="15" rx="1"/>
        <rect height="7" width="6" x="1" y="20" rx="1"/>
      </svg>
      <span class="text-sm font-medium">Analytics</span>
    </a>

    <!-- Settings -->
    <a href="" class="nav-link block py-6 px-6 hover:text-blue-600 rounded-lg flex items-center gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024" fill="currentColor">
        <path d="M600.704 64a32 32 0 0 1 30.464 22.208l35.2 109.376c14.784 7.232 28.928 15.36 42.432 24.512l112.384-24.192a32 32 0 0 1 34.432 15.36L944.32 364.8a32 32 0 0 1-4.032 37.504l-77.12 85.12a357.12 357.12 0 0 1 0 49.024l77.12 85.248a32 32 0 0 1 4.032 37.504l-88.704 153.6a32 32 0 0 1-34.432 15.296L708.8 803.904c-13.44 9.088-27.648 17.28-42.368 24.512l-35.264 109.376A32 32 0 0 1 600.704 960H423.296a32 32 0 0 1-30.464-22.208L357.696 828.48a351.616 351.616 0 0 1-42.56-24.64l-112.32 24.256a32 32 0 0 1-34.432-15.36L79.68 659.2a32 32 0 0 1 4.032-37.504l77.12-85.248a357.12 357.12 0 0 1 0-48.896l-77.12-85.248A32 32 0 0 1 79.68 364.8l88.704-153.6a32 32 0 0 1 34.432-15.296l112.32 24.256c13.568-9.152 27.776-17.408 42.56-24.64l35.2-109.312A32 32 0 0 1 423.232 64H600.64zM512 320a192 192 0 1 1 0 384 192 192 0 0 1 0-384z"/>
      </svg>
      <span class="text-sm font-medium">Settings</span>
    </a>
  </nav>

  <!-- Logout -->
  <div class="p-4 mt-auto">
    <a href="/" class="nav-link flex items-center gap-3 py-3 px-6 hover:text-red-500 rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M9 7V5c0-1.1.9-2 2-2h5c2.2 0 4 1.8 4 4v10c0 2.2-1.8 4-4 4h-5c-1.1 0-2-.9-2-2v-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M15 12H2m0 0 3.5-3M2 12l3.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round""/>
      </svg>
      <span class="text-sm font-medium">Logout</span>
    </a>
  </div>
</aside>
</body>
</html>