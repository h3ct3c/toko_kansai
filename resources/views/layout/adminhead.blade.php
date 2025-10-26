<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kansai Store Dashboard.com</title>
  <link rel="website icon" type="png" href="{{ asset('img/Logo_KansaiK.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-700">

  <!-- HEADER ADMIN -->
  <header class="w-[1160px] bg-gradient-to-br from-blue-900 to-blue-800 px-8 py-5 sticky top-0 rounded-lg shadow-md mb-6">
    <div class="flex items-center justify-between">
      <!-- Bagian kiri -->
      <div class="text-sm text-indigo-100">
        Pages /
        <span class="text-white font-medium capitalize">
          @yield('page_title')
        </span>
      </div>

      <!-- Bagian kanan -->
<div class="text-white font-semibold">
    <p>
        <span>Hello, </span>
        {{ Auth::check() ? explode(' ', Auth::user()->name)[0] : 'Guest' }}
    </p>
</div>
  </header>

</body>
</html>
