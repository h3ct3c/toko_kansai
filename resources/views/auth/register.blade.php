@include('layout.header')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.register_title') }} - Kansai Store.com</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo_KansaiK.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        .custom-input {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1rem;
            border-radius: 0;
            border: 1px solid #d1d5db;
            background-color: white;
        }
        .custom-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
        }
        .custom-input-icon {
            padding-left: 2.5rem;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<main class="flex-grow flex flex-col items-center justify-center pt-20 pb-10 px-4 text-center">

    <div class="flex border-b border-gray-300 w-full max-w-md">
        <a href="{{ route('login') }}" class="flex-1 text-center py-3 font-medium text-gray-500 hover:text-gray-700">
            {{ __('auth.login') }}
        </a>
        <a href="{{ route('register') }}" class="flex-1 text-center py-3 font-semibold border-b-2 border-black text-black">
            {{ __('auth.create_account') }}
        </a>
    </div>

    <div class="p-0 pt-8 pb-4 w-full max-w-md">
        <form id="register-form" method="POST" action="{{ route('register') }}" class="space-y-6 text-left">
            @csrf

            <div>
                <div class="relative">
                    <i data-lucide="user" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                           placeholder="{{ __('auth.fullname_placeholder') }}*" required autofocus
                           class="w-full custom-input custom-input-icon placeholder-gray-500">
                </div>
                @error('name')
                <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="relative">
                    <i data-lucide="mail" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                           placeholder="{{ __('auth.email_placeholder_register') }}*" required
                           class="w-full custom-input custom-input-icon placeholder-gray-500">
                </div>
                @error('email')
                <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="relative">
                    <i data-lucide="lock" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input id="password" name="password" type="password"
                           placeholder="{{ __('auth.password_placeholder_register') }}*" required
                           class="w-full custom-input custom-input-icon placeholder-gray-500">
                </div>
                @error('password')
                <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="relative">
                    <i data-lucide="check-circle" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           placeholder="{{ __('auth.password_confirm_placeholder') }}*" required
                           class="w-full custom-input custom-input-icon placeholder-gray-500">
                </div>
                @error('password_confirmation')
                <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 pt-4">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}" data-callback="hideCaptchaWarning"></div>

                @if ($errors->has('g-recaptcha-response'))
                <span class="text-red-600 text-sm mt-2 block">
                    {{ $errors->first('g-recaptcha-response') }}
                </span>
                @endif

                <span id="captcha-warning" class="text-red-600 text-sm mt-2 hidden">
                    {{ __('auth.captcha_warning') }}
                </span>
            </div>

            <div class="pt-4 pb-4">
                <button type="submit"
                        class="w-full bg-blue-900 text-white py-3 font-medium hover:bg-blue-800 uppercase tracking-widest text-sm rounded-lg"
                        style="border-radius:0; box-shadow:none !important;">
                    {{ __('auth.register_btn') }}
                </button>
            </div>
        </form>
    </div>
</main>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    lucide.createIcons();

    function hideCaptchaWarning() {
        document.getElementById('captcha-warning').classList.add('hidden');
    }

    document.getElementById('register-form').addEventListener('submit', function(e) {
        var response = grecaptcha.getResponse();
        var warning = document.getElementById('captcha-warning');
        if (response.length === 0) {
            e.preventDefault();
            warning.classList.remove('hidden');
        } else {
            warning.classList.add('hidden');
        }
    });
</script>

<div class="mb-[300px]"></div>
@include('layout.footer')

</body>
</html>
