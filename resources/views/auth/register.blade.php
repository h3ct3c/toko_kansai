<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansai Store.com - Register</title>
    <link rel="website icon" type="png" href="{{ asset('img/Logo_KansaiK.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Container -->
    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        <!-- Logo -->
        <div class="mb-6">
            <img src="{{ asset('img/Logo_KansaiK.png') }}" alt="Kansai Store" class="w-20 h-20">
        </div>

        <!-- Card -->
        <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8 border border-gray-100">
            <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Daftar Akun Baru</h1>

            <!-- Form Register -->
            <form id="register-form" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full"
                                  type="text"
                                  name="name"
                                  :value="old('name')"
                                  required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email"
                                  name="email"
                                  :value="old('email')"
                                  required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation"
                                  required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- reCAPTCHA -->
                <div class="mt-8">
                    <div class="g-recaptcha"
                         data-sitekey="{{ config('services.recaptcha.site') }}"
                         data-callback="hideCaptchaWarning"></div>

                    {{-- Error dari backend --}}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="text-red-600 text-sm">
                            {{ $errors->first('g-recaptcha-response') }}
                        </span>
                    @endif

                    {{-- Pesan validasi frontend --}}
                    <span id="captcha-warning" class="text-red-600 text-sm hidden">
                        Isi reCAPTCHA dulu ya, jangan males.
                    </span>
                </div>

                <!-- Tombol -->
                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-indigo-600">
                        {{ __('Sudah punya akun? Masuk di sini') }}
                    </a>
                    <x-primary-button>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
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
