   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansai Store.com</title>
    <link rel="website icon" type="png" href="img/Logo_KansaiK.png">
    <script src="https://cdn.tailwindcss.com"></script>

<x-guest-layout>
    <form id="register-form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- reCAPTCHA -->
        <div class="mt-10">
            <div class="g-recaptcha"
                 data-sitekey="{{ config('services.recaptcha.site') }}"
                 data-callback="hideCaptchaWarning"></div>

            {{-- Error dari backend --}}
            @if ($errors->has('g-recaptcha-response'))
                <span class="text-red-600 text-sm">
                    {{ $errors->first('g-recaptcha-response') }}
                </span>
            @endif

            {{-- Pesan validasi dari frontend --}}
            <span id="captcha-warning" class="text-red-600 text-sm hidden">
                Isi reCAPTCHA terlebih dahulu ya anak pinterr
            </span>
        </div>

        <!-- Button + Link -->
        <div class="flex items-center justify-end mt-8">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

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
        warning.classList.remove("hidden"); // tampilkan pesan merah
    } else {
        warning.classList.add("hidden"); // sembunyikan kalau sudah centang
    }
});
</script>
