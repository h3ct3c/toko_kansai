@include('layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account - Kansai Store.com</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo_KansaiK.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- MAIN --}}
    <main class="flex-grow flex flex-col items-center justify-center pt-20 pb-10 px-4 text-center">
        <h2 class="text-4xl font-bold text-blue-900 mb-2">Create an account</h2>
        <p class="text-gray-500 mb-8 text-sm">Register now and enjoy exclusive offers!</p>

        {{-- FORM REGISTER --}}
        <form id="register-form" method="POST" action="{{ route('register') }}" class="space-y-6 w-full max-w-sm text-left">
            @csrf

            {{-- FULL NAME --}}
            <div>
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                <div class="relative">
                    <i data-lucide="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        placeholder="Enter your name"
                        required
                        autofocus
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-900 transition duration-200"
                    >
                </div>
                @error('name')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div>
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                <div class="relative">
                    <i data-lucide="mail" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="example@email.com"
                        required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-900 transition duration-200"
                    >
                </div>
                @error('email')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div>
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <i data-lucide="lock" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Minimum 8 characters"
                        required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-900 transition duration-200"
                    >
                </div>
                @error('password')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div>
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                <div class="relative">
                    <i data-lucide="check-circle" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repeat your password"
                        required
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-900 transition duration-200"
                    >
                </div>
                @error('password_confirmation')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- CAPTCHA --}}
            <div class="mt-6">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}" data-callback="hideCaptchaWarning"></div>

                @if ($errors->has('g-recaptcha-response'))
                    <span class="text-red-600 text-sm mt-2 block">
                        {{ $errors->first('g-recaptcha-response') }}
                    </span>
                @endif

                <span id="captcha-warning" class="text-red-600 text-sm mt-2 hidden">
                    Please check the reCAPTCHA to continue registration.
                </span>
            </div>

            {{-- BUTTON --}}
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="w-full bg-blue-900 text-white py-3 rounded-lg font-medium hover:bg-blue-800 transition duration-200 shadow-md hover:shadow-lg">
                    Register Now
                </button>

                <p class="text-sm text-gray-600 text-center mt-6">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-semibold text-blue-800 hover:text-blue-900 transition duration-200">
                        Sign in here
                    </a>
                </p>
            </div>
        </form>
    </main>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        lucide.createIcons();

        function hideCaptchaWarning() {
            document.getElementById("captcha-warning").classList.add("hidden");
        }

        document.getElementById("register-form").addEventListener("submit", function(e) {
            var response = grecaptcha.getResponse();
            var warning = document.getElementById("captcha-warning");
            if (response.length === 0) {
                e.preventDefault();
                warning.classList.remove("hidden");
            } else {
                warning.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
<div class="mb-[300px]"></div>

@include('layout.footer')