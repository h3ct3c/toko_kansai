<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Kansai Store Dashboard')</title>
  <link rel="website icon" type="png" href="{{ asset('img/Logo_KansaiK.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-700">

  <!-- SIDEBAR (tetap di kiri) -->
  <aside class="fixed top-0 left-0 h-full w-64 bg-white shadow-sm z-40">
    @include('layout.adminside')
  </aside>

  <!-- MAIN CONTENT -->
  <div class="ml-64 flex-1 flex flex-col min-h-screen p-8">

    <!-- HEADER ADMIN -->
    <div class="max-w-6xl mx-auto w-full">
      @include('layout.adminhead')
    </div>

    <!-- ISI HALAMAN -->
    <main class="flex-1 mt-6 max-w-6xl mx-auto w-full">
      @yield('content')
    </main>

  </div>

</body>
</html>
