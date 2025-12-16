@include('layout.header')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kansai Store.com - Auth</title>
    <link rel="icon" type="image/png" href="{{ asset('img/Logo_KansaiK.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
        .form-input {
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0;
            background: #fff;
        }
        .form-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0,0,0,0.2);
        }
        .tab-active {
            border-bottom: 2px solid #000;
            font-weight: 600;
            color: #000;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<main class="flex-grow flex flex-col items-center pt-24 px-4">

    <div class="flex border-b w-full max-w-md border-gray-300">
        <a href="{{ route('login') }}" class="flex-1 text-center py-3 tab-active">
            {{ __('auth.login') }}
        </a>
        <a href="{{ route('register') }}" class="flex-1 text-center py-3 text-gray-500">
            {{ __('auth.create_account') }}
        </a>
    </div>

    <div class="w-full max-w-md mt-10">
        @if (session('error'))
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 text-sm mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 text-sm mb-4">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <input type="email" name="email" placeholder="{{ __('auth.email') }}" class="form-input w-full">

            <div class="relative">
                <input id="password" type="password" name="password" placeholder="{{ __('auth.password') }}" class="form-input w-full pr-10">
                <span onclick="togglePw()" class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600">
                </span>
            </div>

            <label class="flex items-center text-sm text-gray-700">
                <input type="checkbox" name="remember" class="mr-2 h-4 w-4">
                {{ __('auth.remember') }}
            </label>

            <button class="w-full bg-blue-900 py-3 text-white hover:bg-blue-800 uppercase tracking-widest text-sm">
                {{ __('auth.login_button') }}
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('password.request') }}" class="uppercase text-sm border-b border-black">
                {{ __('auth.forgot') }}
            </a>
        </div>
    </div>
</main>

<script>
    lucide.createIcons();

    function togglePw() {
        const pw = document.getElementById('password');
        pw.type = pw.type === 'password' ? 'text' : 'password';
    }
</script>

<div class="mb-[300px]"></div>
@include('layout.footer')
