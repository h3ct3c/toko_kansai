<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
</head>
<body>
  <!-- Sidebar -->
  <aside class="w-[300px] bg-blue-900 text-white min-h-screen flex flex-col">
    <div class="p-4 font-bold text-lg flex items-center">
      <span class="ml-1 mt-4"></span>
    </div>

    <nav class="flex-1 space-y-2">
      <!-- Account Overview -->
      <a href="{{ route('profile.show') }}" 
         class="nav-link block py-3 px-6 hover:text-blue-200 rounded-lg flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" width="20" height="20" viewBox="0 0 96 96">
          <path d="M69.3677,51.0059a30,30,0,1,0-42.7354,0A41.9971,41.9971,0,0,0,0,90a5.9966,5.9966,0,0,0,6,6H90a5.9966,5.9966,0,0,0,6-6A41.9971,41.9971,0,0,0,69.3677,51.0059ZM48,12A18,18,0,1,1,30,30,18.02,18.02,0,0,1,48,12ZM12.5977,84A30.0624,30.0624,0,0,1,42,60H54A30.0624,30.0624,0,0,1,83.4023,84Z"/>
        </svg>
        <span class="text-sm font-medium">Account Overview</span>
      </a>

      <!-- Address -->
      <a href="/address" 
         class="nav-link block py-6 px-6 hover:text-blue-200 rounded-lg flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024" fill="#ffffff">
          <path d="M607.7 64.2c-102.9 0-186.3 83.4-186.3 186.3 0 30 15.9 66.6 38.3 103.3 15.2 24.8 33.3 49.7 51.7 72.6C559 486 607.7 533 607.7 533s17.7-17.1 42.3-43.8c14-15.3 30.3-33.6 46.7-53.8 47.9-58.7 97.3-132 97.3-184.9 0-102.9-83.4-186.3-186.3-186.3z m77.8 353.2c-8 10-16.1 19.6-23.9 28.6-7.8 9-15.4 17.5-22.5 25.3-12.5 13.7-23.4 25.1-31.4 33.3-12.5-12.8-32.3-33.5-53.8-58.5-7.8-9-15.8-18.5-23.8-28.5-13.5-16.7-25.5-32.7-36.1-48-10.1-14.6-18.8-28.4-26.1-41.5-17.6-31.6-26.6-57.8-26.6-77.8 0-44.4 17.3-86.2 48.7-117.6C521.4 101.3 563.2 84 607.6 84c44.4 0 86.2 17.3 117.6 48.7 31.4 31.4 48.7 73.2 48.7 117.6 0 20-8.9 46.1-26.5 77.6-14.8 26.9-35.6 56.9-61.9 89.5z" />
          <path d="M607.7 183.1c36.9 0 67 30.1 67 67s-30.1 67-67 67-67-30.1-67-67 30-67 67-67m0-20c-48 0-87 38.9-87 87 0 48 38.9 87 87 87 48 0 87-38.9 87-87s-39-87-87-87z" />
          <path d="M927.9 352.4l-195.7 70.3-35.6 12.8c-16.4 20.1-32.7 38.5-46.7 53.8l1.9 0.9v416.6l-12.7-5.9-46.3-21.6-212.2-98.9-8.6-4v-415l139.4 65c-18.4-23-36.5-47.8-51.7-72.6l-77.6-36.2-3.7-1.7-8.6-4-7.8-3.7-2.2 0.8L64 415.3v511.8L362 820l230.8 107.6 46.3 21.6 22.7 10.6L960 852.7V340.9l-32.1 11.5zM352 776.9l-4.9 1.8L108 864.6V446.2l244-87.7v418.4z m564 44.9l-244.2 87.7V491.1l5.1-1.8L916 403.4v418.4z" />
        </svg>
        <span class="text-sm font-medium">Address</span>
      </a>

      <!-- Account Settings -->
      <a href="{{ route('profile.edit') }}" 
         class="nav-link block py-6 px-6 hover:text-blue-200 rounded-lg flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="#ffffff">
          <path d="M4 1v5h3V1H4zm1 1h1v3H5V2zM0 3v1h3V3H0zm8 0v1h12V3H8zm5 5v5h3V8h-3zm1 1h1v3h-1V9zM0 10v1h12v-1H0zm17 0v1h3v-1h-3zM4 15v5h3v-5H4zm1 1h1v3H5v-3zM0 17v1h3v-1H0zm8 0v1h12v-1H8z"/>
        </svg>
        <span class="text-sm font-medium">Account Settings</span>
      </a>
    </nav>
  </aside>
</body>
</html>
