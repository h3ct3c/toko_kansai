@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansai Store.com - Login</title>
    <link rel="icon" type="image/png" href="img/Logo_KansaiK.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- MAIN --}}
    <main class="flex-grow flex flex-col items-center justify-center text-center pt-28 px-4">
        <h2 class="text-4xl font-bold text-blue-900 mb-2">Login</h2>
        <p class="text-gray-500 mb-8 text-sm">Please sign in to continue</p>

        {{-- ALERT ERROR --}}
        @if (session('error'))
            <div id="alert-message" class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm mb-4 w-full max-w-sm text-left">
                <strong class="font-semibold">Oops!</strong>
                <span class="block">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div id="alert-message" class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-sm mb-4 w-full max-w-sm text-left">
                <strong class="font-semibold">Error!</strong>
                <ul class="list-disc pl-5 mt-1 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-6 w-full max-w-sm">
            @csrf

            <div class="text-left">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-900 transition duration-200"
                >
            </div>

            <div class="text-left">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-900 transition duration-200"
                >
            </div>

            <div class="flex items-center justify-between text-sm text-gray-600">
                <label class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-blue-900 border-gray-300 rounded focus:ring-blue-900">
                    <span class="ml-2">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blue-800 hover:text-blue-900 font-medium transition">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-900 text-white py-3 rounded-lg font-medium hover:bg-blue-800 transition duration-200">
                Log in
            </button>
        </form>

        <p class="text-sm text-gray-600 mt-8">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-blue-800 hover:text-blue-900 font-semibold transition">
                Sign up
            </a>
        </p>
    </main>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);
    </script>
</body>
</html>
<div class="mb-[300px]"></div>

@include('layout.footer')