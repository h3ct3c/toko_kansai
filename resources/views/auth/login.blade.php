<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansai Store.com - Login</title>
    <link rel="website icon" type="png" href="img/Logo_KansaiK.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-4 p-2 flex items-center justify-center">
                <img 
                    src="img/Logo_KansaiK.png" 
                    alt="Kansai Store Logo" 
                    class="w-full h-full object-contain">
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8 space-y-8 transition-all duration-500 hover:shadow-xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-800 to-blue-900 bg-clip-text text-transparent">Welcome Back</h2>
                <p class="text-gray-500 mt-2">Please sign in to continue</p>
            </div>

            <form method="POST" action="/login" class="space-y-6"> 
                <div class="relative">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                    
                    <div class="relative">                        
                        <input
                            id="email" 
                            class="w-full pl-6 py-3 rounded-xl border border-gray-200 **hover:border-blue-900** focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition-all duration-200 bg-white/50" 
                            type="email" 
                            name="email" 
                            placeholder="Enter your email"
                            required 
                            autofocus 
                            autocomplete="username" 
                        />
                        </div>
                </div>

                <div class="relative">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>

                    <div class="relative">                        
                        <input
                            id="password" 
                            class="w-full pl-6 py-3 rounded-xl border border-gray-200 **hover:border-blue-900** focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition-all duration-200 bg-white/50"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            required 
                            autocomplete="current-password" 
                        />
                        </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-900 focus:ring-blue-900 border-gray-300 rounded" name="remember">
                        <label for="remember_me" class="ml-2 text-gray-600 text-sm">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-blue-800 hover:text-blue-900 font-medium transition-colors duration-200" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                    @endif
                    </div>

                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-blue-800 to-blue-900 text-white py-3 rounded-xl hover:opacity-90 transition duration-200 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl"
                >
                    Log in
                </button>
            </form>

            <p class="text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-800 hover:text-blue-900 font-semibold transition-colors duration-200">
                    Sign up
                </a>
            </p>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>