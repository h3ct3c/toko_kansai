<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Kansai Store.com</title>
    <link rel="website icon" type="png" href="{{ asset('img/Logo_KansaiK.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script> 
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">

        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-2 p-2 flex items-center justify-center">
                <img 
                    src="{{ asset('img/Logo_KansaiK.png') }}" 
                    alt="Kansai Store Logo" 
                    class="w-full h-full object-contain"
                >
            </div>
        </div>
        
        <div class="w-[510px] bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl p-8 space-y-8 transition-all duration-500 hover:shadow-xl">
            
            <div class="text-center">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-800 to-blue-900 bg-clip-text text-transparent">Register Account</h2>
                <p class="text-gray-500 mt-2">Daftar sekarang dan nikmati penawaran eksklusif!</p>
            </div>

            <form id="register-form" method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div class="relative">
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="block text-gray-700 text-sm font-medium mb-2" />
                    <div class="relative">
                        <i data-lucide="user" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                        <x-text-input 
                            id="name" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 hover:border-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition-all duration-200 bg-white/50"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required autofocus autocomplete="name"
                            placeholder="Masukkan nama Anda"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
                    </div>
                </div>

                <div class="relative">
                    <x-input-label for="email" :value="__('Alamat Email')" class="block text-gray-700 text-sm font-medium mb-2" />
                    <div class="relative">
                        <i data-lucide="mail" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                        <x-text-input 
                            id="email" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 hover:border-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition-all duration-200 bg-white/50"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required autocomplete="username"
                            placeholder="contoh@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
                    </div>
                </div>

                <div class="relative">
                    <x-input-label for="password" :value="__('Kata Sandi')" class="block text-gray-700 text-sm font-medium mb-2" />
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                        <x-text-input 
                            id="password" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 hover:border-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition-all duration-200 bg-white/50"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Minimal 8 karakter"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
                    </div>
                </div>

                <div class="relative">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="block text-gray-700 text-sm font-medium mb-2" />
                    <div class="relative">
                        <i data-lucide="check-circle" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                        <x-text-input 
                            id="password_confirmation" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 hover:border-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition-all duration-200 bg-white/50"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password"
                            placeholder="Ulangi kata sandi"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-500" />
                    </div>
                </div>

                <div class="mt-6 mb-6">
                    <div class="g-recaptcha"
                        data-sitekey="{{ config('services.recaptcha.site') }}"
                        data-callback="hideCaptchaWarning"></div>

                    {{-- Error dari backend --}}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="text-red-600 text-sm mt-2 block">
                            {{ $errors->first('g-recaptcha-response') }}
                        </span>
                    @endif

                    {{-- Pesan validasi frontend --}}
                    <span id="captcha-warning" class="text-red-600 text-sm mt-2 hidden">
                        Harap centang reCAPTCHA untuk melanjutkan pendaftaran.
                    </span>
                </div>

                <div class="flex flex-col items-center justify-center space-y-4">
                    
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-blue-800 to-blue-900 text-white py-3 rounded-xl hover:opacity-90 transition duration-200 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl font-semibold"
                    >
                        Daftar Sekarang
                    </button>

                    <div class="mt-1 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="font-semibold text-blue-800 hover:text-blue-900 transition duration-200">
                                {{ __('Masuk di sini') }}
                            </a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // Panggil lucide.createIcons() agar ikon muncul
        lucide.createIcons();
        
        function hideCaptchaWarning() {
            document.getElementById("captcha-warning").classList.add("hidden");
        }

        document.getElementById("register-form").addEventListener("submit", function(e) {
            var response = grecaptcha.getResponse();
            var warning = document.getElementById("captcha-warning");

            if(response.length === 0) {
                e.preventDefault();
                warning.classList.remove("hidden");
            } else {
                warning.classList.add("hidden");
            }
        });
    </script>
</body>
</html>