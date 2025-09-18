<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansai Paint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- 🔹 Navbar --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8">
                <span class="font-bold text-lg text-blue-700">KANSAI PAINT</span>
            </a>

            {{-- Menu --}}
            <div class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
                <a href="{{ url('/product') }}" class="hover:text-blue-600">Produk</a>
                <a href="{{ url('/warna') }}" class="hover:text-blue-600">Warna</a>
            </div>

            {{-- Icon kanan --}}
            <div class="flex items-center space-x-4">
                {{-- Cart --}}
                <a href="{{ route('cart.index') }}" id="cart-btn" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A1 1 0 007.5 18h11a1 1 0 00.9-.55L21 13H7zm5 5a1 1 0 11-2 0 1 1 0 012 0zm8 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                    <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded-full">
                        0
                    </span>
                </a>

                {{-- User --}}
                @guest
                    <a href="{{ route('login') }}" class="px-3 py-1 border rounded hover:bg-gray-100">Masuk</a>
                    <a href="{{ route('register') }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Daftar</a>
                @else
                    <span class="font-semibold">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-1 border rounded hover:bg-gray-100">Keluar</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    {{-- 🔹 Konten halaman --}}
    <main class="min-h-screen container mx-auto px-6 py-8">
        @yield('content')
    </main>

    {{-- 🔹 Footer --}}
    <footer class="bg-gray-900 text-gray-300 py-6 mt-10">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} Kansai Paint. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>
